<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\User;
use App\Models\Job;
use App\Models\Notification;
use Carbon\Carbon;
use App\Rules\DeadlineValidationRule;
use Illuminate\Validation\Rule;

class RecruiterController extends Controller
{
  public function index()
  {
    $company_id = Auth::id();
    $posted_job = Job::where("job_owner_id", $company_id)->count();
    $app1 = Application::where('application_status', 'accepted')
      ->whereHas('Job', function ($query) use ($company_id) {
        $query->where('job_owner_id', $company_id);
      })
      ->count();
    $app2 = Application::where('application_status', 'processed')
      ->whereHas('Job', function ($query) use ($company_id) {
        $query->where('job_owner_id', $company_id);
      })
      ->count();

    $app3 = Application::where('application_status', 'rejected')
      ->whereHas('Job', function ($query) use ($company_id) {
        $query->where('job_owner_id', $company_id);
      })
      ->count();

    $listed_jobs = Job::where('job_owner_id', $company_id)
      ->orderBy('created_at', 'asc')
      ->paginate(10);

    $unread_notif = Notification::where('receiver_id', Auth::id())->where('status', 'Belum Dibaca')->count();
    return view('recruiter.homepage', compact('posted_job', 'app1', 'app2', 'app3', 'listed_jobs', 'unread_notif'));
  }

  // MANAJEMEN LOWONGAN
  public function show_job_vacancies()
  {
    $vacancies = Job::where('job_owner_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
    $unread_notif = Notification::where('receiver_id', Auth::id())->where('status', 'Belum Dibaca')->count();
    return view('recruiter.kelola-lowongan', compact('vacancies', 'unread_notif'));
  }

  public function get_vacancy($id)
  {
    $vacancy = Job::find($id);
    $unread_notif = Notification::where('receiver_id', Auth::id())->where('status', 'Belum Dibaca')->count();
    // Retrieve the content from the database
    $responsibilities = $vacancy->responsibilities;

    // Replace the <ol> tags with the desired HTML code
    $responsibilities = str_replace('<ol>', '<ul class="list-unstyled m-0 p-0">', $responsibilities);
    $responsibilities = str_replace('</ol>', '</ul>', $responsibilities);
    $responsibilities = str_replace('<li>', '<li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span>', $responsibilities);

    // Retrieve the content from the database
    $experience = $vacancy->experience;

    // Replace the <ol> tags with the desired HTML code
    $experience = str_replace('<ol>', '<ul class="list-unstyled m-0 p-0">', $experience);
    $experience = str_replace('</ol>', '</ul>', $experience);
    $experience = str_replace('<li>', '<li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span>', $experience);

    // Retrieve the content from the database
    $benefits = $vacancy->benefits;

    // Replace the <ol> tags with the desired HTML code
    $benefits = str_replace('<ol>', '<ul class="list-unstyled m-0 p-0">', $benefits);
    $benefits = str_replace('</ol>', '</ul>', $benefits);
    $benefits = str_replace('<li>', '<li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span>', $benefits);

    return view('recruiter.vacancy', compact('vacancy', 'responsibilities', 'experience', 'benefits', 'unread_notif'));
  }

  public function create_new_job()
  {
    $unread_notif = Notification::where('receiver_id', Auth::id())->where('status', 'Belum Dibaca')->count();
    return view('recruiter.create_new_job', compact('unread_notif'));
  }

  public function store_new_job(Request $request)
  {
    // validasi request
    $request->validate([
      'job_title'         => 'required|min:5|max:64',
      'job_description'   => 'required|min:64',
      'job_category'      => 'required',
      'location'          => 'required|min:5|max:128',
      'job_type'          => 'required',
      'responsibilities'  => 'nullable|min:5',
      'experience'        => 'nullable|min:5',
      'benefits'          => 'nullable|min:5',
      'vacancy'           => 'required|min:1',
      'salary'            => 'required|min:5',
      'gender'            => 'required',
      'deadline'          => ['required', new DeadlineValidationRule],
      'image'             => 'image|mimes:jpeg,jpg,png|max:4096'
    ]);

    $currentTime = Carbon::now();

    $job = new Job();
    $job->job_title = $request->job_title;
    $job->job_description = $request->job_description;
    $job->job_category = $request->job_category;
    $job->location = $request->location;
    $job->job_owner_id = $request->job_owner_id;
    $job->job_status = "open";
    $job->job_type  = $request->job_type;
    $job->responsibilities = $request->responsibilities;
    $job->experience = $request->experience;
    $job->benefits = $request->benefits;
    $job->vacancy = $request->vacancy;
    $job->salary = $request->salary;
    $job->gender = $request->gender;
    $job->deadline = $request->deadline;
    $job->created_at = $currentTime;
    $job->updated_at = $currentTime;


    if ($request->hasFile('image')) {
      //    menentukan lokasi folder pada path lokal
      $location = public_path('/user/images/job');

      // ambil file image dan simpan ke local server
      $request->file('image')->move($location, $request->file('image')->getClientOriginalName());

      // simpan nama file di database
      $job->image = $request->file('image')->getClientOriginalName();
    }
    $job->save();

    return redirect('/recruiter/kelola-lowongan')->with('status', 'Lowongan berhasil ditambahkan!');
  }

  public function edit_job($id)
  {
    $job = Job::find($id);
    $unread_notif = Notification::where('receiver_id', Auth::id())->where('status', 'Belum Dibaca')->count();
    return view('recruiter.edit_job', compact('job', 'unread_notif'));
  }

  public function update_job(Request $request, $id)
  {
    // Retrieve the job based on the provided ID
    $job = Job::findOrFail($id);

    // Validate the form data
    $validatedData = $request->validate([
      'job_title'         => 'required|min:5|max:64',
      'job_description'   => 'required|min:64',
      'job_category'      => 'required',
      'job_status'        => 'required',
      'location'          => 'required|min:5|max:128',
      'job_type'          => 'required',
      'responsibilities'  => 'nullable|min:5',
      'experience'        => 'nullable|min:5',
      'benefits'          => 'nullable|min:5',
      'vacancy'           => 'required|min:1',
      'salary'            => 'required|min:3',
      'gender'            => 'required',
      'deadline'          => ['required', new DeadlineValidationRule],
      'image'             => 'image|mimes:jpeg,jpg,png|max:4096'
    ]);

    // Update the job attributes with the validated data
    $job->update($validatedData);

    if ($request->hasFile('image')) {
      //    define image location in local path
      $location = public_path('/user/images/job');

      // Delete the existing file
      $existingFile = $location . '/' . $job->image;
      if (file_exists($existingFile)) {
        unlink($existingFile);
      }

      // ambil file image dan simpan ke local server
      $request->file('image')->move($location, $request->file('image')->getClientOriginalName());

      // simpan nama file di database
      $job->image = $request->file('image')->getClientOriginalName();
    }

    $job->save();
    return redirect('/recruiter/kelola-lowongan')->with('status', 'Lowongan sudah diperbaharui.');
  }

  public function delete_job($id)
  {
    $applications = Application::where('job_id', $id)->get();
    foreach ($applications as $application) {
      $notif = new Notification;
      $notif->receiver_id = $application->applicant_id;
      $notif->notification_title = "Pemberitahuan penghapusan lowongan.";
      $notif->notification_text = "Lamaran Anda untuk lowongan kerja " . $application->job->job_title . " yang disediakan oleh mitra " . Auth::user()->name . " dibatalkan karena lowongan ini dihapus oleh mitra dengan alasan tertentu.";
      $notif->status = "Belum Dibaca";
      $notif->save();
    }

    Application::where('job_id', $id)->delete();
    Job::find($id)->delete();
    return redirect('/recruiter/kelola-lowongan')->with('status', "Postingan berhasil dihapus");
  }

  // AKHIR MANAJEMEN LOWONGAN

  // MANAJEMEN LAMARAN
  public function show_applications()
  {
    $unread_notif = Notification::where('receiver_id', Auth::id())->where('status', 'Belum Dibaca')->count();
    $id = Auth::id();
    $applications = Application::whereHas('Job', function ($query) use ($id) {
      $query->where('job_owner_id', $id);
    })->get();
    return view('recruiter.kelola-lamaran', compact('applications', 'unread_notif'));
  }

  public function application($id)
  {
    $unread_notif = Notification::where('receiver_id', Auth::id())->where('status', 'Belum Dibaca')->count();
    $application = Application::where('id', $id)->first();
    return view('recruiter.application-detail', compact('application', 'unread_notif'));
  }

  public function update_application(Request $request, $id)
  {

    // save application
    $application = Application::find($id);
    $job = Job::find($application->job_id);
    $application->application_status = $request->application_status;
    $application->save();

    // save notification
    if ($request->application_status == 'accepted' || $request->application_status == 'rejected') {
      $notif = new Notification;
      $notif->receiver_id = $request->receiver_id;
      if ($request->application_status == 'accepted') {
        $notif->notification_title = "Selamat! Lamaranmu diterima.";
        $notif->notification_text = "Lamaranmu pada lowongan" . $job->job_title . " yang disediakan oleh mitra " . Auth::user()->name . " sudah diterima. Periksa email dan Whatsapp secara berkala untuk menerima informasi lebih lanjut.";
      } else if ($request->application_status == 'rejected') {
        $notif->notification_title = "Yah :( Lamaranmu ditolak.";
        $notif->notification_text = "Lamaranmu pada lowongan " . $job->job_title . " yang disediakan oleh mitra " . Auth::user()->name . " ditolak. Jangan putus asa, ya! Masih ada lowongan lain yang bisa kamu coba. Semangat!";
      }
      $notif->status = "Belum Dibaca";
      $notif->save();
    }
    return redirect()->route('r.show_applications')->with('status', 'Status Lamaran berhasil diubah.');
  }
  // AKHIR MANAJEMEN LAMARAN 

  // NOTIFICATIONS
  public function get_notifications()
  {
    $unread_notif = Notification::where('receiver_id', Auth::id())->where('status', 'Belum Dibaca')->count();
    $notifications = Notification::where('receiver_id', Auth::id())->orderBy('created_at', 'desc')->paginate(20);
    return view('recruiter.notifications', compact('notifications', 'unread_notif'));
  }

  public function mark_as_read(Request $request)
  {
    $rcv_id = $request->receiver_id;
    $notifications = Notification::where('receiver_id', $rcv_id)->where('status', 'Belum Dibaca')->get();

    foreach ($notifications as $notification) {
      $notification->status = 'Sudah Dibaca';
      $notification->save();
    }

    return redirect()->route('r.notifications');
  }
  // AKHIR NOTIFIKASI

  // PROFILE
  public function get_profile()
  {
    $unread_notif = Notification::where('receiver_id', Auth::id())->where('status', 'Belum Dibaca')->count();
    return view('recruiter.profile', compact('unread_notif'));
  }

  public function update_profile(Request $request)
  {
    // Validate request
    $request->validate([
      'name' => 'required|min:5|max:64',
      'address' => 'required|min:3',
      'phone_number' => [
        'required',
        Rule::unique('users', 'phone_number')->ignore(Auth::user()->id),
        'min:12',
        'max:15',
      ],
      'image' => 'image|mimes:jpeg,jpg,png|max:4096',
    ]);

    $user = User::find(Auth::user()->id);

    // Update user data
    $user->name = $request->name;
    $user->address = $request->address;
    $user->phone_number = $request->phone_number;

    if ($request->hasFile('pfp')) {
      //    define image location in local path
      $location = public_path('/user/images');

      // Delete the existing file
      $existingFile = $location . '/' . $user->pfp;
      if (file_exists($existingFile)) {
        unlink($existingFile);
      }

      // ambil file image dan simpan ke local server
      $request->file('pfp')->move($location, $request->file('pfp')->getClientOriginalName());

      // simpan nama file di database
      $user->pfp = $request->file('pfp')->getClientOriginalName();
    }

    // Save the updated user
    $user->save();

    // Redirect or return a response
    // You can modify this based on your application's needs
    return redirect()->route('r.profile')->with('status', 'Profile sudah diperbaharui!');
  }
  // AKHIR PROFILE
}
