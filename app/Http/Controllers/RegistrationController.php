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
    // Validate the input data
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'phone_number' => 'required|string|max:15',
        'seat_zone' => 'required',
        'seat_number' => 'required',
    ]);

    // ตรวจสอบ `name` ซ้ำ
    if (Registration::where('name', $validated['name'])->exists()) {
        return response()->json([
            'success' => false,
            'message' => 'ชื่อซ้ำ! กรุณากรอกชื่ออื่น',
        ], 400);
    }

    // ตรวจสอบ `phone_number` ซ้ำ
    if (Registration::where('phone_number', $validated['phone_number'])->exists()) {
        return response()->json([
            'success' => false,
            'message' => 'เบอร์โทรศัพท์นี้ได้ถูกลงทะเบียนแล้ว!',
        ], 400);
    }

    // ตรวจสอบ `seat_zone` และ `seat_number` ซ้ำพร้อมกัน
    if (Registration::where('seat_zone', $validated['seat_zone'])
        ->where('seat_number', $validated['seat_number'])
        ->exists()) {
        return response()->json([
            'success' => false,
            'message' => 'ที่นั่งนี้ถูกจองแล้ว! กรุณาเลือกที่นั่งอื่น',
        ], 400);
    }

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

    // ส่งข้อมูลกลับไปยังผู้ใช้
    return response()->json([
        'success' => true,
        'message' => 'ลงทะเบียนสำเร็จ!',
    ]);
}

}
