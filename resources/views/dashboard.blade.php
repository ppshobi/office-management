@extends('layouts.app')

@section('content')
    <div class="row gap-20 masonry pos-r">
        <div class="masonry-sizer col-md-6"></div>
        <div class="masonry-item  w-100">
            <div class="row gap-20">
                <!-- #Unique Visitors ==================== -->
                <div class='col-md-3'>
                    <div class="layers bd bgc-white p-20">
                        <div class="layer w-100 mB-10">
                            <h6 class="lh-1">Last 30 Days Credit</h6>
                        </div>
                        <div class="layer w-100">
                            <div class="peers ai-sb fxw-nw">
                                <div class="peer peer-greed">
                                    <span id="sparklinedash3"></span>
                                </div>
                                <div class="peer">
                                    <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-10 pY-10 bgc-purple-50 c-purple-500">
                                    <span class="fa fa-inr"></span>
                                        {{ $creditLastMonth }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- #Bounce Rate ==================== -->
                <div class='col-md-3'>
                    <div class="layers bd bgc-white p-20">
                        <div class="layer w-100 mB-10">
                            <h6 class="lh-1">Last 30 Days Expense</h6>
                        </div>
                        <div class="layer w-100">
                            <div class="peers ai-sb fxw-nw">
                                <div class="peer peer-greed">
                                    <span id="sparklinedash4"></span>
                                </div>
                                <div class="peer">
                                    <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-10 pY-10 bgc-blue-50 c-blue-500">
                                        <span class="fa fa-inr"></span>
                                        {{ $debitLastMonth }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- #Toatl Visits ==================== -->
                <div class='col-md-3'>
                    <div class="layers bd bgc-white p-20">
                        <div class="layer w-100 mB-10">
                            <h6 class="lh-1">Total Students</h6>
                        </div>
                        <div class="layer w-100">
                            <div class="peers ai-sb fxw-nw">
                                <div class="peer peer-greed">
                                    <span id="sparklinedash"></span>
                                </div>
                                <div class="peer">
                                    <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-10 pY-10 bgc-green-50 c-green-500">
                                        <span class="fa fa-list-ol"></span>
                                        {{ $studentCount }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- #Total Page Views ==================== -->
                <div class='col-md-3'>
                    <div class="layers bd bgc-white p-20">
                        <div class="layer w-100 mB-10">
                            <h6 class="lh-1">Total Courses</h6>
                        </div>
                        <div class="layer w-100">
                            <div class="peers ai-sb fxw-nw">
                                <div class="peer peer-greed">
                                    <span id="sparklinedash2"></span>
                                </div>
                                <div class="peer">
                                    <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-10 pY-10 bgc-red-50 c-red-500">
                                        <span class="fa fa-list-ul"></span>
                                        {{ $courseCount }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="masonry-item col-12">
            <!-- #Site Visits ==================== -->
            <div class="bd bgc-white">
                <div class="peers fxw-nw@lg+ ai-s">
                    <div class="peer peer-greed w-70p@lg+ w-100@lg- p-20">
                        <div class="layers">
                            <div class="layer w-100 mB-10">
                                <h6 class="lh-1">Statistics</h6>
                            </div>
                            <div class="layer w-100">
                                <div class="bd bgc-white">
                                    <div class="layers">
                                        <div class="layer w-100 pX-20 pT-20">
                                            <h6 class="lh-1">Monthly Stats</h6>
                                        </div>
                                        <div class="layer w-100 p-20">
                                            <transaction-chart>
                                            </transaction-chart>
                                        </div>
                                        <div class="layer bdT p-20 w-100">
                                            <div class="peers ai-c jc-c gapX-20">
                                                <div class="peer">
                                                    <span class="fsz-def fw-600 mR-10 c-grey-800">10% <i class="fa fa-level-up c-green-500"></i></span>
                                                    <small class="c-grey-500 fw-600">APPL</small>
                                                </div>
                                                <div class="peer fw-600">
                                                    <span class="fsz-def fw-600 mR-10 c-grey-800">2% <i class="fa fa-level-down c-red-500"></i></span>
                                                    <small class="c-grey-500 fw-600">Average</small>
                                                </div>
                                                <div class="peer fw-600">
                                                    <span class="fsz-def fw-600 mR-10 c-grey-800">15% <i class="fa fa-level-up c-green-500"></i></span>
                                                    <small class="c-grey-500 fw-600">Sales</small>
                                                </div>
                                                <div class="peer fw-600">
                                                    <span class="fsz-def fw-600 mR-10 c-grey-800">8% <i class="fa fa-level-down c-red-500"></i></span>
                                                    <small class="c-grey-500 fw-600">Profit</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
