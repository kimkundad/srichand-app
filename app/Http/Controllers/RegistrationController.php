<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
use App\Services\GoogleSheet;
use Carbon\Carbon;

class RegistrationController extends Controller
{
    protected $googleSheet;

    public function __construct(GoogleSheet $googleSheet)
    {
        $this->googleSheet = $googleSheet;
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'seat_zone' => 'required',
            'seat_number' => 'required',
        ]);

        // บันทึกข้อมูลลงในฐานข้อมูล
        $registration = Registration::create([
            'name' => $validated['name'],
            'phone_number' => $validated['phone_number'],
            'seat_zone' => $validated['seat_zone'],
            'seat_number' => $validated['seat_number'],
            'registered_at' => Carbon::now(),
        ]);

        // บันทึกข้อมูลลงใน Google Sheet
        $spreadsheetId = '16NRSN-QcY2hB-Xivh0KoV8JMllMJszl-d6NePqXaPhk'; // ใส่ Spreadsheet ID ที่ต้องการ
        $range = 'Sheet1'; // ใส่ชื่อ Sheet
        $this->googleSheet->appendRow($spreadsheetId, $range, [
            $registration->id,
            $registration->name,
            $registration->phone_number,
            $registration->seat_zone,
            $registration->seat_number,
            optional($registration->registered_at)->toDateTimeString() ?? 'Not Registered', // ใช้ข้อความแทนเมื่อ null
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Registration successful!'
        ]);
    }
}
