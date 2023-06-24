@extends('layouts.main')
@section('content')

<div id="dashboard">
    <div class="row">
        <div class="col-xl-3 col-sm-6 col-12">
            <div id="userCard" class="card card-body">
                <div class="media">
                    <div class="media-body">
                        <h3 class="success">{{$userCount}}</h3>
                        <span>Users</span>
                    </div>
                    <div class="align-self-center">
                        <i class="fa-solid fa-user"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
            <div id="ingredientCard" class="card card-body">
                <div class="media">
                    <div class="media-body">
                        <h3 class="success">{{$ingredientCount}}</h3>
                        <span>Ingredients</span>
                    </div>
                    <div class="align-self-center">
                        <i class="fa-solid fa-wheat-awn-circle-exclamation"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
            <div id="recipeCard" class="card card-body">
                <div class="media">
                    <div class="media-body">
                        <h3 class="success">100</h3>
                        <span>Recipes</span>
                    </div>
                    <div class="align-self-center">
                        <i class="fa-solid fa-utensils"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
            <div id="visitCard" class="card card-body">
                <div class="media">
                    <div class="media-body">
                        <h3 class="success">133</h3>
                        <span>Total Visit</span>
                    </div>
                    <div class="align-self-center">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection