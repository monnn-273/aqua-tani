<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Application;
use App\Models\Job;
use App\Models\UserSkill;
use App\Models\Notification;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AdminController extends Controller
{
  public function index()
  {
    $partners = User::where('role', 2)->count();
    $candidates = User::where('role', 2)->count();
    $jobs = Job::count();
    $apps = Application::count();
    $employed = Application::where('application_status', 'accepted')->count();
    $open = Job::where('job_status', 'open')->count();

    $today = Carbon::today()->toDateString(); // Get the current date in the format 'Y-m-d'

    $new_users = User::whereDate('created_at', $today)->count();
    return view('admin.dashboard', compact('partners', 'candidates', 'jobs', 'apps', 'employed', 'open', 'new_users'));
  }

  // MANAJEMEN PENGGUNA
  public function get_admins()
  {
    $admins = User::where('role', 1)->orderBy('created_at', 'desc')->paginate(20);
    $total = User::where('role', 1)->count();
    return view('admin.admins', compact('admins', 'total'));
  }

  public function get_admin($id)
  {
    $admin = User::find($id);
    return view('admin.admin', compact('admin'));
  }

  public function create_admin()
  {
    return view('admin.add_admin');
  }
  public function store_new_admin(Request $request)
  {
    $request->validate([
      'name' => 'required|min:3',
      'email' => 'required|email|unique:users',
      'password' => 'required|min:8|confirmed',
      'pfp' => 'image|mimes:jpeg,jpg,png|max:4096',
    ]);



    $admin = new User();
    $admin->name = $request->name;
    $admin->email = $request->email;
    $admin->password = bcrypt($request->password);
    $admin->role = 1;
    if ($request->hasFile('pfp')) {
      //    define image location in local path
      $location = public_path('/user/images/');

      // ambil file image dan simpan ke local server
      $request->file('pfp')->move($location, $request->file('pfp')->getClientOriginalName());

      // simpan nama file di database
      $admin->pfp = $request->file('pfp')->getClientOriginalName();
    }

    $admin->save();
    return redirect()->route('a.admins')->with('status', 'Admin baru berhasil ditambahkan');
  }

  public function get_partners()
  {
    $partners = User::where('role', 2)->orderBy('created_at', 'desc')->orderBy('updated_at', 'desc')->paginate(25);
    $total = User::where('role', 2)->count();
    return view('admin.partners', compact('partners', 'total'));
  }

  public function get_partner($id)
  {
    $partner = User::find($id);
    return view('admin.partner', compact('partner'));
  }

  public function get_applicants()
  {
    $candidates = User::where('role', 3)->orderBy('created_at', 'desc')->paginate(25);
    $total = $admins = User::where('role', 3)->count();
    return view('admin.applicants', compact('candidates', 'total'));
  }

  public function get_applicant($id)
  {
    $candidate = User::find($id);
    return view('admin.applicant', compact('candidate'));
  }

  public function update_user(Request $request, $id)
  {
    $user = User::find($id);
    $old_role = $user->role;
    $request->validate([
      'name' => 'required|min:5|max:64',
      'address' => 'nullable|min:3',
      'phone_number' => [
        'nullable',
        Rule::unique('users', 'phone_number')->ignore($user->id),
        'min:12',
      ],
      'email' => [
        'required',
        Rule::unique('users', 'email')->ignore($user->id),
        'min:8',
        'max:64',
      ],
      'role' => 'required',
    ]);

    // Handle case if user is candidate but after updated the role is not candidate anymore
    // one have to delete their application and userskills first
    if ($old_role == 3 && $request->role != 3) {
      Application::where('applicant_id', $user->id)->delete();
      UserSkill::where('user_id', $user->id)->delete();
    } else if ($old_role == 2 && $request->role != 2) {
      // Handle case if user is partner but after updated the role is not partner anymore
      // one have to delete all application toward the jobs they've made, and then delete all related jobs before update their role
      $jobs = Job::where('job_owner_id', $user->id)->get();
      if (!empty($jobs)) {
        foreach ($jobs as $job) {
          Application::where('job_id', $job->id)->delete();
          $job->delete();
        }
      }
    }

    // Update the job attributes with the validated data
    $user->name = $request->name;
    $user->address = $request->address;
    $user->name = $request->name;
    $user->phone_number = $request->phone_number;
    $user->role = $request->role;
    $user->save();

    if ($user->role == 1) {
      return redirect()->route('a.admins')->with('status', 'Pengguna Berhasil Diperbaharui.');
    } elseif ($user->role == 2) {
      return redirect()->route('a.partners')->with('status', 'Pengguna Berhasil Diperbaharui.');
    } else {
      return redirect()->route('a.applicants')->with('status', 'Pengguna Berhasil Diperbaharui.');
    }
  }

  public function delete_user(Request $request, $id)
  {
    $user = User::find($id);

    if (!$user) {
      // Handle the case when the user with the given ID is not found
      return redirect()->back()->with('status', 'Pengguna tidak ditemukan.');
    }

    if ($user->role == 1) {
      // Handle the case when the user is an admin
      $user->delete();
      return redirect()->route('a.admins')->with('status', 'Pengguna Sudah Dihapus.');
    } elseif ($user->role == 2) {
      // Handle the case when the user is a partner
      $jobs = Job::where('job_owner_id', $id)->get();

      foreach ($jobs as $job) {
        Application::where('job_id', $job->id)->delete();
        $job->delete();
      }

      $user->delete();
      return redirect()->route('a.partners')->with('status', 'Pengguna Sudah Dihapus.');
    } else {
      // Handle the case when the user is an applicant
      Application::where('applicant_id', $id)->delete();
      UserSkill::where('user_id', $id)->delete();
      $user->delete();

      return redirect()->route('a.applicants')->with('status', 'Pengguna Sudah Dihapus.');
    }
  }
  // AKHIR MANAJEMEN PENGGUNA

  // MANAJEMEN LOWONGAN
  public function get_vacancies()
  {
    $jobs = Job::orderBy('created_at', 'desc')->orderBy('updated_at', 'desc')->paginate(25);
    $total = Job::count();
    return view('admin.vacancies', compact('jobs', 'total'));
  }

  public function get_vacancy($id)
  {
    $job = Job::find($id);
    return view('admin.vacancy', compact('job'));
  }

  public function update_job(Request $request, $id)
  {
    // Retrieve the job based on the provided ID
    $job = Job::find($id);

    // untuk membuat notifikasi bagi mitra
    $notif = new Notification;
    $notif->receiver_id = $job->owner->id;
    $notif->notification_title = "Pemberitahuan Pembaharuan Lowongan";
    $notif->notification_text = "Lowongan Anda dengan judul " . $job->job_title . " telah diperbaharui oleh administrator AquaTani. Harap menunggu konfirmasi konfirmasi lebih lanjut atau hubungi administrator AquaTani.";
    $notif->save();

    // Update the job attributes with the validated data
    $job->job_title = $request->job_title;
    $job->job_description = $request->job_description;
    $job->job_category = $request->job_category;
    $job->job_status = $request->job_status;
    $job->location = $request->location;
    $job->job_type = $request->job_type;
    $job->responsibilities = $request->responsibilities;
    $job->experience = $request->experience;
    $job->benefits = $request->benefits;
    $job->vacancy = $request->vacancy;
    $job->salary = $request->salary;
    $job->gender = $request->gender;
    $job->deadline = $request->deadline;

    if ($request->hasFile('image')) {
      // Define the image location on the local path
      $location = public_path('/user/images/job');

      // Delete the existing file
      $existingFile = $location . '/' . $job->image;
      if (file_exists($existingFile)) {
        unlink($existingFile);
      }

      // Move the uploaded image to the local server
      $request->file('image')->move($location, $request->file('image')->getClientOriginalName());

      // Store the image file name in the database
      $job->image = $request->file('image')->getClientOriginalName();
    }

    $job->save();

    return redirect()->route('a.vacancies')->with('status', 'Lowongan sudah diperbaharui.');
  }

  public function delete_job($id)
  {
    $job = Job::find($id);
    $applications = Application::where('job_id', $id)->get();
    foreach ($applications as $application) {
      $j = Job::find($application->job->id);
      // Check if applicant_id exists and is not null
      if (!is_null($application->applicant_id)) {
        $notif = new Notification;
        $notif->receiver_id = $application->applicant_id;
        $notif->notification_title = "Pemberitahuan penghapusan lowongan.";
        $notif->notification_text = "Lamaran Anda untuk lowongan kerja " . $j->job_title . " yang disediakan oleh mitra " . $j->owner->name . " dibatalkan karena lowongan ini dihapus oleh adminstrator AquaTani. Hubungi mitra untuk keterangan lebih lanjut.";
        $notif->save();
      }
    }

    // pemberitahuan ke mitra
    $n = new Notification;
    $n->receiver_id = $job->owner->id;
    $n->notification_title = "Pemberitahuan penghapusan lowongan.";
    $n->notification_text = "Lowongan kerja " . $job->job_title . " yang Anda sediakan telah dihapus oleh administrator AquaTani. Tunggu informasi detail dari AquaTani atau hubungi pihak AquaTani untuk informasi lebih lanjut.";
    $n->save();

    // hapus foto ilustrasi
    $location = public_path('/user/images/job');

    // Delete the existing file
    $existingFile = $location . '/' . $job->image;
    if (file_exists($existingFile)) {
      unlink($existingFile);
    }

    Application::where('job_id', $id)->delete();
    Job::find($id)->delete();
    return redirect()->route('a.vacancies')->with('status', "Lowongan berhasil dihapus");
  }
  // AKHIR MANAJEMEN LOWONGAN

  // MANAJEMEN LAMARAN
  public function get_applications()
  {
    $applications = Application::orderBy('created_at', 'desc')->orderBy('updated_at', 'desc')->paginate(10);
    $total = Application::count();
    return view('admin.applications', compact('applications', 'total'));
  }

  public function get_application($id)
  {
    $application = Application::find($id);
    return view('admin.application', compact('application'));
  }

  public function update_application(Request $request, $id)
  {
    $application = Application::find($id);
    $job = Job::find($application->job->id);
    $application->application_status = $request->status;
    $application->save();

    $notif = new Notification;
    $notif->receiver_id = $application->applicant_id;
    $notif->status = "Belum Dibaca";

    if ($request->status == 'accepted') {
      $notif->notification_title = "Selamat! Lamaranmu sudah diterima.";
      $notif->notification_text = "Lamaranmu pada lowongan " . $job->job_title . " oleh mitra " . $job->owner->name . " sudah diterima. Perlu diperhatikan bahwa lamaran ini diterima oleh administrator AquaTani. Harap menunggu informasi lebih lanjut langsung oleh mitra, atau tanyakan langsung pada mitra penyedia lowongan.";
      $notif->save();
    } else if ($request->status == 'rejected') {
      $notif->notification_title = "Yah:( Lamaranmu ditolak.";
      $notif->notification_text = "Lamaranmu pada lowongan " . $job->job_title . " oleh mitra " . $job->owner->name . " ditolak. Perlu diperhatikan bahwa lamaran ini diterima oleh administrator AquaTani. Harap menunggu informasi lebih lanjut atau tanyakan langsung pada mitra penyedia lowongan.";
      $notif->save();
    }

    return redirect()->route('a.applications')->with('status', 'Status lamaran sudah diubah.');
  }

  public function delete_application($id)
  {
    $application = Application::find($id);
    $job = Job::find($application->job->id);

    $notif = new Notification;
    $notif->receiver_id = $application->applicant_id;
    $notif->notification_title = "Yah :( Lamaran kamu pada lowongan " . $job->job_title . " pada mitra " . $job->owner->name . " dihapus oleh administrator. Harap hubungi mitra untuk informasi lebih lanjut.";
    Application::where('id', $id)->delete();
    return redirect()->route('a.applications')->with('status', "Lamaran kerja sudah dihapus.");
  }
  // AKHIR MANAJEMEN LAMARAN

  // MANAJEMEN PROFILE 
  public function get_profile()
  {
    return view('admin.profile');
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
    return redirect()->route('a.profile')->with('status', 'Profile sudah diperbaharui!');
  }
  // AKHIR MANAJEMEN PROFILE
}
