@extends('Maternal.layout')
@section('content')
    <div class="row ml-3">
        <div class="col-9">
            <div class="row">
                <h5 style="text-align: left">Current Status &rarr;</h5>
                <div class="container card shadow-lg bg-body-tertiary rounded">
                    <div class="row">
                        <div class="col-7">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Modi quod animi illum ipsam ullam iure! Illo itaque laudantiu,
                            aperiam voluptas quos maxime necessitatibus perferendis eveniet perspiciatis cupiditate ut
                            , blanditiis quam!
                        </div>
                        <div class="col-5">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Modi quod animi illum ipsam ullam iure! Illo itaque laudantiu,
                            aperiam voluptas quos maxime necessitatibus perferendis eveniet perspiciatis cupiditate ut
                            , blanditiis quam!
                        </div>
                    </div>
                </div>
            </div>
            <div class="container card shadow-lg bg-body-tertiary rounded"></div>
            <div class="row">
                <div style="width: auto;">
                    <div id="mothers_data" style="display: none;">
                        {{ json_encode($mothers) }}
                    </div>
                    <canvas id="progress" width="300px" height="300px">

                    </canvas>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="container card shadow-lg bg-body-tertiary rounded">
                <div class="row">
                    <div class="card-body">
                        <h5 class="card-title">Lorem ipsum</h5>
                        <p class="card-title">
                            dolor sit amet consectetur adipisicing elit. Inventore,
                            nostrum! Voluptates eum similique in fuga,
                            tempora voluptate sunt recusandae,
                            praesentium natus inventore, quaerat quasi non nostrum quibusdam sit eligendi assumenda!
                        </p>
                    </div>
                </div>
            </div>
            <div class="container card shadow-lg bg-body-tertiary rounded">
                <div class="row">
                    <div class="card-body">
                        <h5 class="card-title">Lorem ipsum</h5>
                        <p class="card-title">
                            dolor sit amet consectetur adipisicing elit. Inventore,
                            nostrum! Voluptates eum similique in fuga,
                            tempora voluptate sunt recusandae,
                            praesentium natus inventore, quaerat quasi non nostrum quibusdam sit eligendi assumenda!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="module" src="{{ asset('myjs.js')}}"></script>
@endsection
