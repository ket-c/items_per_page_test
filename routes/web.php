<?php

use App\Livewire\Opportunities;
use Illuminate\Support\Facades\Route;

Route::get('/', Opportunities::class);

Route::get('/opportunities',Opportunities::class);
