<?php

namespace App\Http\Controllers;

use App\Models\ContactSubmission;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ContactController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name'    => ['required', 'string', 'max:150'],
            'company' => ['nullable', 'string', 'max:150'],
            'email'   => ['required', 'email', 'max:255'],
            'phone'   => ['nullable', 'string', 'max:50'],
            'product' => ['nullable', 'string', 'max:100'],
            'message' => ['required', 'string', 'min:10', 'max:3000'],
        ]);

        ContactSubmission::create([
            ...$validated,
            'ip_address' => $request->ip(),
            'locale'     => substr($request->header('Accept-Language', 'en'), 0, 2),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Your message has been received. We will contact you shortly.',
        ], 201);
    }
}
