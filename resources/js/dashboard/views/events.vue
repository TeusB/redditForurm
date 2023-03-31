<template>
    <div id="schedule" class="pt90 pb90">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 mr-auto ml-auto text-center">
                    <div  style="margin-bottom: 6vh; margin-top: 4vh" class="center-title mb60">
                        <h2>Event Schedule</h2>
                    </div>
                </div>
            </div>
            <div class="row margin-b-30">
                <div class="col-md-10 mr-auto ml-auto">
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active show" id="01">
                            <div class="row margin-b-30">
                                <div class="col-sm-3 event-info">
                                    <span>Monday 03/04/2023</span>
                                    <span>14:00 AM to 17:00 AM</span>
                                </div>
                                <div class="col-sm-9 event-detail">
                                    <h3>Kunsttentoonstelling in het theater</h3>
                                    <div class="row margin-b-20">
                                        <div class="col-sm-2">
                                            <img style="height: 90%" src="../../../css/images/person.jpg" alt=""
                                                 class="img-fluid">
                                        </div>
                                        <div class="col-sm-10">
                                            <h4>Jeroen de Vries</h4>
                                            <p>
                                                Beste kunstliefhebbers, binnenkort organiseert ons theater een tentoonstelling over hedendaagse kunst. We zijn erg enthousiast over dit evenement en willen graag weten wat jullie ervan vinden.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div  style="margin-top: 5%" role="tabpanel" class="tab-pane fade active show" id="02">
                            <div class="row margin-b-30">
                                <div class="col-sm-3 event-info">
                                    <span>Tuesday 12/04/2023</span>
                                    <span>9:00 AM to 10:45 AM</span>
                                </div>
                                <div class="col-sm-9 event-detail">
                                    <h3>Kunsttentoonstelling in Schouwburg Tilburg</h3>
                                    <div class="row margin-b-20">
                                        <div class="col-sm-2">
                                            <img style="height: 90%" src="../../../css/images/person.jpg" alt=""
                                                 class="img-fluid">
                                        </div>
                                        <div class="col-sm-10">
                                            <h4>Jeroen de Vries</h4>
                                            <p>
                                                Beste kunstliefhebbers, binnenkort organiseert ons theater een tentoonstelling over hedendaagse kunst. We zijn erg enthousiast over dit evenement en willen graag weten wat jullie ervan vinden.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div  style="margin-top: 5%" role="tabpanel" class="tab-pane fade active show" id="02">
                            <div class="row margin-b-30">
                                <div class="col-sm-3 event-info">
                                    <span>Saturday 23/04/2023</span>
                                    <span>21:00 PM to 03:00 AM</span>
                                </div>
                                <div class="col-sm-9 event-detail">
                                    <h3>Technorave Smederij</h3>
                                    <div class="row margin-b-20">
                                        <div class="col-sm-2">
                                            <img style="height: 120%" src="../../../css/images/person.jpg" alt=""
                                                 class="img-fluid">
                                        </div>
                                        <div class="col-sm-10">
                                            <h4>Jeroen de Vries</h4>
                                            <p>
                                                Beste ravers, 23 april organiseren wij een rave bij club smederij. kom je ook?
                                            </p>
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
</template>
<style>
body {
    margin-top: 20px;
    background:#f8f8f8;
}


/*
schedule
*/

.tabs-schedule.nav-tabs {
    border: 0px;
    border-bottom: 2px solid #f5f5f5;
    margin-bottom: 40px;
    margin-left: 0px;
    text-align: center;
}

.tabs-schedule.nav-tabs > li {
    padding: 0px;
}

.tabs-schedule.nav-tabs > li > a {
    font-size: 20px;
    display: block;
    padding: 4px 20px;
    color: #333;
    font-family: "Open Sans", sans-serif;
    font-weight: 700;
    margin-bottom: -2px;
    position: relative;
    border: 0px;
}

.tabs-schedule.nav-tabs > li  {
    content: "";
    width: 0;
    height: 2px;
    position: absolute;
    left: 0;
    bottom: 0;
    background: #8bcb26;
    transition: all .3s;
    -webkit-transition: all .3s;
}

.tabs-schedule.nav-tabs > li > a span {
    font-size: 12px;
    display: block;
    color: #999;
    font-family: #8bcb26;
    font-weight: 400;
}

.tabs-schedule.nav-tabs > li > a.active,
.tabs-schedule.nav-tabs > li > a:hover {
    color: #8bcb26;
}

.tabs-schedule.nav-tabs > li ,
.tabs-schedule.nav-tabs > li  {
    width: 100%;
}

.event-info {
    padding-right: 30px;
    text-align: right;
    text-transform: uppercase;
}

.event-info span {
    display: block;
    font-size: 16px;
}

.event-info .event-hall {
    margin-top: 10px;
    font-style: normal;
    font-size: 12px;
    padding: 3px 10px;
    border-right: 3px solid #8bcb26;
    background: #f5f5f5;
    font-weight: 400;
}

.event-detail {
    border-left: 2px solid #8bcb26;
    padding-left: 30px;
    position: relative;
}

.event-detail:before {
    width: 14px;
    height: 14px;
    border-radius: 7px;
    background: #fff;
    position: absolute;
    left: -7px;
    top: 10px;
    content: "";
}

.event-detail:after {
    font-family: "FontAwesome";
    position: absolute;
    left: -2px;
    top: 3px;
    color: #8bcb26;
    font-size: 28px;
}

.event-detail h3 {
    margin-bottom: 20px;
}

.event-detail h3 a {
    color: #555;
}

.event-detail .img-fluid {
    border-radius: 5px;
}

.event-detail h4 {
    margin-bottom: 0px;
    font-weight: 600;
    font-size: 14px;
    color: #666;
}


</style>
<script>

</script>
