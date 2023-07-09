<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\User;
use App\Models\Job;

class GuestController extends Controller
{
    public function index()
    {
        $locations = Job::select('location')->distinct()->get();
        $open_job     = Job::where("job_status", "open")->count();
        $candidates     = User::where("role", 3)->count();
        $filled_job     = Application::where('application_status', 'accepted')->count();
        $companies      = User::where("role", 2)->count();
        $listed_jobs    = Job::orderBy('created_at', 'desc')
            ->paginate(10);
        $job_total    = Job::count();

        return view('guest.welcome', compact('open_job', 'candidates', 'filled_job', 'companies', 'listed_jobs', 'job_total', 'locations'));
    }

    public function register()
    {
        return view('auth.register2');
    }

    public function get_vacancy($id)
    {
        $vacancy = Job::find($id);
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

        return view('guest.vacancy', compact('vacancy', 'responsibilities', 'experience', 'benefits'));
    }

    public function get_vacancies()
    {
        $vacancies = Job::orderBy('created_at', 'desc')->paginate(25);
        $vacancies_total = Job::count();
        $available_vacancies = Job::where('job_status', 'open')->count();
        return view('guest.vacancies', compact('vacancies', 'vacancies_total', 'available_vacancies'));
    }

    public function get_agriculture_vacancies()
    {
        $vacancies = Job::where('job_category', 'pertanian')->orderBy('created_at', 'desc')->paginate(25);
        $vacancies_total = Job::where('job_category', 'pertanian')->count();
        $available_vacancies = Job::where('job_category', 'pertanian')->where('job_status', 'open')->count();
        return view('guest.vacancies-agriculture', compact('vacancies', 'vacancies_total', 'available_vacancies'));
    }

    public function get_fishery_vacancies()
    {
        $vacancies = Job::where('job_category', 'perikanan')->orderBy('created_at', 'desc')->paginate(25);
        $vacancies_total = Job::where('job_category', 'perikanan')->count();
        $available_vacancies = Job::where('job_category', 'perikanan')->where('job_status', 'open')->count();
        return view('guest.vacancies-fishery', compact('vacancies', 'vacancies_total', 'available_vacancies'));
    }

    public function searchVacancies(Request $request)
    {
        $mainKeyword = $request->mainKeyword;
        $location = $request->location;
        $jobType = $request->jobType;

        $vacancies = Job::query();

        if ($mainKeyword !== null) {
            $vacancies->where('job_title', 'like', '%' . $mainKeyword . '%');
        }

        if ($request->filled('location')) {
            $vacancies->where('location', $location);
        }

        if ($jobType !== null) {
            $vacancies->where('job_type', $jobType);
        }

        $results = $vacancies->get();
        return view('guest.search_result', compact('results'));
    }
}
