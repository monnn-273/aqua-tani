<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RecruiterController;

Route::get('/register-as-recruiter', [GuestController::class, 'register']);
Route::get('/', [GuestController::class, 'index'])->name('welcome');
Route::get('/lowongan/{id}', [GuestController::class, 'get_vacancy'])->name('g.vacancy');
Route::get('/lowongan', [GuestController::class, 'get_vacancies'])->name('g.vacancies');
Route::get('/search', [GuestController::class, 'searchVacancies'])->name('g.search');
Route::get('/lowongan-pertanian', [GuestController::class, 'get_agriculture_vacancies'])->name('g.agriculture-vacancies');
Route::get('/lowongan-perikanan', [GuestController::class, 'get_fishery_vacancies'])->name('g.fishery-vacancies');
Route::get('/tentang-kami', function () {
    return view('guest.about');
})->name('g.about');
Route::get('/testimoni', function () {
    return view('guest.testimoni');
})->name('g.testimonial');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth', 'admin')->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('a.dashboard');
    Route::get('admin/kelola-admin', [AdminController::class, 'get_admins'])->name('a.admins');
    Route::get('admin/kelola-mitra', [AdminController::class, 'get_partners'])->name('a.partners');
    Route::get('admin/kelola-kandidat', [AdminController::class, 'get_applicants'])->name('a.applicants');
    Route::get('admin/kelola-kandidat/{id}', [AdminController::class, 'get_applicant'])->name('a.applicant');
    Route::get('admin/kelola-admin/{id}', [AdminController::class, 'get_admin'])->name('a.admin');
    Route::get('admin/kelola-mitra/{id}', [AdminController::class, 'get_partner'])->name('a.partner');
    Route::put('admin/kelola-admin/{id}', [AdminController::class, 'update_user'])->name('a.update-admin');
    Route::put('admin/kelola-mitra/{id}', [AdminController::class, 'update_user'])->name('a.update-partner');
    Route::put('admin/kelola-kandidat/{id}', [AdminController::class, 'update_user'])->name('a.update-candidate');
    Route::delete('/admin/kelola-admin/{id}/delete', [AdminController::class, 'delete_user'])->name('a.delete_admin');
    Route::delete('/admin/kelola-mitra/{id}/delete', [AdminController::class, 'delete_user'])->name('a.delete_partner');
    Route::delete('/admin/kelola-kandidat/{id}/delete', [AdminController::class, 'delete_user'])->name('a.delete_candidate');
    Route::get('admin/kelola-lowongan', [AdminController::class, 'get_vacancies'])->name('a.vacancies');
    Route::get('admin/kelola-lowongan/{id}', [AdminController::class, 'get_vacancy'])->name('a.vacancy');
    Route::delete('admin/kelola-lowongan/{id}', [AdminController::class, 'delete_job'])->name('a.delete_job');
    Route::put('/admin/kelola-lowongan/{id}', [AdminController::class, 'update_job'])->name('a.update-vacancy');
    Route::get('admin/kelola-lamaran', [AdminController::class, 'get_applications'])->name('a.applications');
    Route::get('admin/kelola-lamaran/{id}', [AdminController::class, 'get_application'])->name('a.application');
    Route::put('admin/kelola-lamaran/{id}', [AdminController::class, 'update_application'])->name('a.update-application');
    Route::delete('admin/kelola-lamaran/{id}', [AdminController::class, 'delete_application'])->name('a.delete_application');
    Route::get('admin/profile', [AdminController::class, 'get_profile'])->name('a.profile');
    Route::put('/admin/profile', [AdminController::class, 'update_profile'])->name('a.update-profile');
    Route::get('/admin/create-admin', [AdminController::class, 'create_admin'])->name('a.create_admin');
    Route::post('/admin/create-admin', [AdminController::class, 'store_new_admin'])->name('a.store_new_admin');
});

Route::middleware('auth', 'recruiter')->group(function () {
    Route::get('/recruiter/beranda', [RecruiterController::class, 'index'])->name('r.homepage');
    Route::get('/recruiter/pekerjaan', [RecruiterController::class, 'create_new_job']);
    Route::get('/recruiter/pekerjaan/{id}', [RecruiterController::class, 'get_vacancy'])->name('r.vacancy');
    Route::post('/recruiter/pekerjaan', [RecruiterController::class, 'store_new_job'])->name('r.create_new_job');
    Route::get('/recruiter/kelola-lowongan', [RecruiterController::class, 'show_job_vacancies'])->name('r.show_vacancies');
    Route::get('/recruiter/kelola-lamaran', [RecruiterController::class, 'show_applications'])->name('r.show_applications');
    Route::get('/recruiter/kelola-lowongan/{id}', [RecruiterController::class, 'edit_job'])->name('r.edit_job');
    Route::patch('/recruiter/kelola-lowongan/{id}', [RecruiterController::class, 'update_job'])->name('r.update-job');
    Route::delete('/recruiter/kelola-lowongan/{id}/delete', [RecruiterController::class, 'delete_job'])->name('r.delete_job');
    Route::get('/recruiter/notifikasi', [RecruiterController::class, 'get_notifications'])->name('r.notifications');
    Route::get('/recruiter/kelola-lamaran/{id}', [RecruiterController::class, 'application'])->name('r.application-detail');
    Route::put('/recruiter/kelola-lamaran/{id}', [RecruiterController::class, 'update_application'])->name('r.update-application');
    Route::get('/recruiter/profile', [RecruiterController::class, 'get_profile'])->name('r.profile');
    Route::patch('/recruiter/profile', [RecruiterController::class, 'update_profile'])->name('r.update-profile');
    Route::post('/recruiter/notifikasi', [RecruiterController::class, 'mark_as_read'])->name('r.mark-as-read');
});

Route::middleware('auth', 'user')->group(function () {
    Route::get('/user/beranda', [UserController::class, 'index'])->name('u.homepage');
    Route::get('/user/lowongan', [UserController::class, 'get_vacancies'])->name('u.vacancies');
    Route::get('/user/lowongan-pertanian', [UserController::class, 'get_agriculture_vacancies'])->name('u.agriculture-vacancies');
    Route::get('/user/lowongan-perikanan', [UserController::class, 'get_fishery_vacancies'])->name('u.fishery-vacancies');
    Route::get('/user/lowongan/{id}', [UserController::class, 'get_vacancy'])->name('u.vacancy');
    Route::get('/user/lamaran', [UserController::class, 'get_applications'])->name('u.applications');
    Route::get('/user/notifikasi', [UserController::class, 'get_notifications'])->name('u.notifications');
    Route::get('/user/profile', [UserController::class, 'get_profile'])->name('u.profile');
    Route::post('/user/lamaran', [UserController::class, 'create_application'])->name('u.apply');
    Route::post('/user/notifikasi', [UserController::class, 'mark_as_read'])->name('u.mark-as-read');
    Route::delete('/user/lamaran/{id}/delete', [UserController::class, 'delete_application'])->name('u.delete-application');
    Route::delete('/user/keahlian/{id}/delete', [UserController::class, 'delete_skill'])->name('u.delete-skill');
    Route::patch('/user/profile', [UserController::class, 'update_profile'])->name('u.update-profile');
    Route::post('/user/create-skill', [UserController::class, 'create_skill'])->name('u.create-skill');
    Route::post('/user/create-skill/v2', [UserController::class, 'create_skill_2'])->name('u.create-skill-2');
});

require __DIR__ . '/auth.php';
