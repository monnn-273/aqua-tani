<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\User;
use App\Models\Job;
use App\Models\Skill;
use App\Models\UserSkill;
use App\Models\Notification;
use Carbon\Carbon;
use App\Rules\DeadlineValidationRule;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;


class UserController extends Controller
{
  public function index()
  {
    $posted_job     = Job::where("job_status", "open")->count();
    $candidates     = User::where("role", 3)->count();
    $filled_job     = Application::where('application_status', 'accepted')->count();
    $companies      = User::where("role", 2)->count();
    $listed_jobs    = Job::orderBy('created_at', 'desc')
      ->paginate(10);
    $unread_notif = Notification::where('receiver_id', Auth::id())->where('status', 'Belum Dibaca')->count();
    $job_total = Job::count();
    return view('job-seeker.homepage', compact('posted_job', 'candidates', 'filled_job', 'companies', 'listed_jobs', 'unread_notif', 'job_total'));
  }

  public function get_vacancies()
  {
    $vacancies = Job::orderBy('created_at', 'desc')->paginate(25);
    $vacancies_total = Job::count();
    $available_vacancies = Job::where('job_status', 'open')->count();
    $unread_notif = Notification::where('receiver_id', Auth::id())->where('status', 'Belum Dibaca')->count();
    return view('job-seeker.vacancies', compact('vacancies', 'vacancies_total', 'available_vacancies', 'unread_notif'));
  }

  public function get_vacancy($id)
  {
    $vacancy = Job::find($id);

    // Replace the <ol> tags with the desired HTML code
    $responsibilities = $vacancy->responsibilities;

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
    $unread_notif = Notification::where('receiver_id', Auth::id())->where('status', 'Belum Dibaca')->count();
    return view('job-seeker.vacancy', compact('vacancy', 'unread_notif', 'responsibilities', 'experience', 'benefits'));
  }

  public function get_applications()
  {
    $applications = Application::where('applicant_id', Auth::id())->paginate(20);
    $unread_notif = Notification::where('receiver_id', Auth::id())->where('status', 'Belum Dibaca')->count();
    return view('job-seeker.applications', compact('applications', 'unread_notif'));
  }

  public function get_notifications()
  {
    $unread_notif = Notification::where('receiver_id', Auth::id())->where('status', 'Belum Dibaca')->count();
    $notifications = Notification::where('receiver_id', Auth::id())->orderBy('created_at', 'desc')->paginate(20);
    return view('job-seeker.notifications', compact('notifications', 'unread_notif'));
  }

  public function get_profile()
  {
    $userSkills = Auth::user()->userskill;
    $registeredSkills = $userSkills->pluck('skill_id')->toArray();
    $skills = Skill::whereNotIn('id', $registeredSkills)->get();
    $unread_notif = Notification::where('receiver_id', Auth::id())->where('status', 'Belum Dibaca')->count();

    return view('job-seeker.profile', compact('userSkills', 'skills', 'unread_notif'));
  }


  public function get_agriculture_vacancies()
  {
    $vacancies = Job::where('job_category', 'pertanian')->orderBy('created_at', 'desc')->paginate(25);
    $vacancies_total = Job::where('job_category', 'pertanian')->count();
    $available_vacancies = Job::where('job_category', 'pertanian')->where('job_status', 'open')->count();
    $unread_notif = Notification::where('receiver_id', Auth::id())->where('status', 'Belum Dibaca')->count();
    return view('job-seeker.vacancies-agriculture', compact('vacancies', 'vacancies_total', 'available_vacancies', 'unread_notif'));
  }

  public function get_fishery_vacancies()
  {
    $vacancies = Job::where('job_category', 'perikanan')->orderBy('created_at', 'desc')->paginate(25);
    $vacancies_total = Job::where('job_category', 'perikanan')->count();
    $available_vacancies = Job::where('job_category', 'perikanan')->where('job_status', 'open')->count();
    $unread_notif = Notification::where('receiver_id', Auth::id())->where('status', 'Belum Dibaca')->count();
    return view('job-seeker.vacancies-fishery', compact('vacancies', 'vacancies_total', 'available_vacancies', 'unread_notif'));
  }

  public function create_application(Request $request)
  {
    // Create and save the application
    $application = new Application;
    $application->applicant_id = $request->applicant_id;
    $application->job_id = $request->job_id;
    $application->application_status = "processed";
    $application->save();

    $job = Job::find($request->job_id);

    $notif = new Notification;
    $notif->receiver_id = $request->company_id;
    $notif->notification_title = "Lamaran oleh " . Auth::user()->name;
    $notif->notification_text = "Satu lamaran baru pada lowongan " . $job->job_title . " diterima. Lamaran ditandai sebagai sedang diproses. Silakan kelola lamaran Anda secara berkala.";
    $notif->status = "Belum Dibaca";
    $notif->save();

    // Redirect back to the previous accessed link
    return redirect()->back();
  }

  public function mark_as_read(Request $request)
  {
    $rcv_id = $request->receiver_id;
    $notifications = Notification::where('receiver_id', $rcv_id)->where('status', 'Belum Dibaca')->get();

    foreach ($notifications as $notification) {
      $notification->status = 'Sudah Dibaca';
      $notification->save();
    }

    return redirect()->route('u.notifications');
  }

  public function delete_application($id)
  {
    Application::where('id', $id)->delete();
    return redirect('/user/lamaran')->with('status', "Lamaran sudah dihapus.");
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
      $location = public_path('/user/images/');

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
    return redirect()->route('u.profile')->with('status', 'Profile sudah diperbaharui!');
  }

  public function create_skill(Request $request)
  {
    // Validate request
    $request->validate([
      'skill_id' => 'required',
    ]);

    $userSkill = new UserSkill();
    $userSkill->skill_id  = $request->skill_id;
    $userSkill->user_id   =  Auth::user()->id;
    $userSkill->save();

    return redirect('/user/profile')->with('status', "Satu keahlian ditambahkan ke profile Anda.");
  }

  public function create_skill_2(Request $request)
  {
    // Validate request
    $request->validate([
      'skill_name' => 'required|min:3|max:64',
    ]);

    $skill = new Skill;
    $skill->skill_name = $request->skill_name;
    $skill->save();

    $userSkill = new UserSkill();
    $userSkill->skill_id  = $skill->id;
    $userSkill->user_id   =  Auth::user()->id;
    $userSkill->save();

    return redirect('/user/profile')->with('status', "Satu keahlian ditambahkan ke profile Anda.");
  }

  public function delete_skill($id)
  {
    UserSkill::where('skill_id', $id)->delete();
    return redirect('/user/profile')->with('status', "Satu keahlian Anda dihapus dari profile.");
  }
}
