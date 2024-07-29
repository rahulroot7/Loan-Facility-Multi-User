@extends('layouts.master') 
@section('content')
<div class="app-content">
    <div class="side-app">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <div>
                <h1 class="page-title">Dashboard 01</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard 01</li>
                </ol>
            </div>
        </div>

            <div class="home-dashboard">
              <div class="card-category-1">
                <div class="basic-card basic-card-aqua">
                  <div class="card-content">
                    <span class="card-title">
                      Total User
                    </span>
                    <p class="card-text">{{ @$users }}</p>
                  </div>
                  <div class="card-link">
                    <a href="{{ route('users.index') }}" title="Read Full">
                      <span>
                        Read Full
                      </span>
                    </a>
                  </div>
                </div>
                <div class="basic-card basic-card-lips">
                  <div class="card-content">
                    <span class="card-title">
                     Total Vehical
                    </span>
                    <p class="card-text">567</p>
                  </div>
                 <div class="card-link">
                    <a href="#" title="Read Full">
                      <span>
                        Read Full
                      </span>
                    </a>
                  </div>
                </div>
                <div class="basic-card basic-card-light">
                  <div class="card-content">
                    <span class="card-title">
                     Total Customer
                    </span>
                    <p class="card-text">
                     8200000
                    </p>
                  </div>
                  <div class="card-link">
                    <a href="#" title="Read Full">
                      <span>
                        Read Full
                      </span>
                    </a>
                  </div>
                </div>
               
              </div>
              <br/>
            </div>

        <!-- PAGE-HEADER END -->
    </div>
</div> 
@endsection