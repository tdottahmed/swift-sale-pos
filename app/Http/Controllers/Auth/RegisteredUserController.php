<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        // dd("heelo");

        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request, ): RedirectResponse
    {
        // dd("hello");
        
       
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'image' => ['nullable', 'image', 'max:2048'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        // dd($user);
        $user->personalizeSettings()->create([
                'user_id'=>$user->id,
                'background_color'=>null,
                'font_family'=>null,
                'theme'=>'default',
        ]);
        
          if ($request->hasFile('image')) {
            $user->addMediaFromRequest('image')->toMediaCollection('avatars'); 
          }
        
        event(new Registered($user));
        Auth::login($user);
        
        return redirect()->route('login');
    }
}
