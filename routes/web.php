<?php

use App\Http\Controllers\Admin\BitsOfficerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\OfficerDashbaord;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScanQrController;
use App\Mail\QrcodeMail;
use App\Models\EventDay;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});
//ADMIN ROUTES
Route::group(['middleware' => ['auth','admin'], 'prefix' => 'admin', 'as' => 'admin.'], function(){
    Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');
    Route::get('/add-bits-officer', [BitsOfficerController::class, 'index'])->name('index');
    Route::get('/add-bits-officer/add-item', [BitsOfficerController::class, 'create'])->name('create');
    Route::post('/add-bits-officer-store', [BitsOfficerController::class, 'store'])->name('store');
    Route::post('/status-toggle', [BitsOfficerController::class, 'toggle'])->name('toggle.status');
    Route::post('/status-toggle-payment', [BitsOfficerController::class, 'toggle_payment'])->name('toggle_payment.status');
    Route::post('/promotion', [BitsOfficerController::class, 'promotion'])->name('promotion.index');
    Route::post('/demote', [BitsOfficerController::class, 'demote'])->name('demote.index');

});
// OFFICER ROUTES
Route::group(['middleware' => ['auth','officer'], 'prefix' => 'officer', 'as' => 'officer.'], function(){
    Route::get('/dashboard', [OfficerDashbaord::class, 'index'])->name('dashboard');
    Route::get('/dashboard/pending', [StudentController::class, 'pending'])->name('pending');
    Route::post('/send-qr-code-email', [StudentController::class, 'sendQrCodeEmail'])->name('sendQrCodeEmail');
    Route::get('/scan-qr-code', [ScanQrController::class, 'indexScan'])->name('index.scanqr');
    Route::post('/found-student', [ScanQrController::class, 'findScan'])->name('foundStudent');
    Route::get('/event-scanner', [EventController::class, 'index'])->name('event.index');
    Route::get('/ceate-event', [EventController::class, 'createEvent'])->name('createEvent');
    Route::post('/store-event', [EventController::class, 'storeEvent'])->name('storeEvent');
    Route::get('/export-attendance', [EventController::class, 'export'])->name('export');
    Route::post('/attendance-cutoff', [ScanQrController::class, 'sendCutOff'])->name('sendCutOff');
    Route::get('/payment-attendance', [PaymentController::class, 'indexPayment'])->name('index.payment');
    Route::get('/get-payment-info/{id}', [PaymentController::class, 'edit'])->name('payment.edit');
    Route::post('/payment-received', [PaymentController::class, 'paid'])->name('paid.index');

    Route::get('/event-days/{eventId}', function ($eventId) {
        $eventDays = EventDay::where('event_record_id', $eventId)->get();
        return response()->json($eventDays);
    });

    Route::get('/sessions/{eventId}/{dayId}', function ($eventId, $dayId) {

        $sessions = DB::table('sessions')
            ->where('event_record_id', $eventId)
            ->where('day_id', $dayId)
            ->get(['session', 'login_status', 'logout_status']); // Select the relevant fields

        return response()->json($sessions);
    });

});
//STUDENT ROUTES
Route::group(['middleware' => ['auth','student'], 'prefix' => 'student', 'as' => 'student.'], function(){
    Route::get('/dashboard', [StudentController::class, 'index'])->name('dashboard');


});

require __DIR__.'/auth.php';
