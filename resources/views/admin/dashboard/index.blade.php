@extends('admin.layouts.master')

@section('contents')
<section class="welcome p-t-10">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="title-4">Welcome back
                    <span>ADMIN!</span>
                </h1>
                <hr class="line-seprate">
            </div>
        </div>
    </div>
</section>

<div id="containerPie"></div>

<div class="row row m-t-25">

    <div class="col-lg-6">
        <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
            <div class="au-card-title"  style="background-image: url('{{ asset('asset/images/bg-title-01.jpg') }}');">
                <div class="bg-overlay bg-overlay--blue"></div>
                <h3>
                    <i class="zmdi zmdi-account-calendar"></i>26 April, 2018</h3>
                <button class="au-btn-plus">
                    <i class="zmdi zmdi-plus"></i>
                </button>
            </div>
            <div class="au-task js-list-load">
                <div class="au-task__title">
                    <p>Tasks for John Doe</p>
                </div>
                <div class="au-task-list js-scrollbar3">
                    <div class="au-task__item au-task__item--danger">
                        <div class="au-task__item-inner">
                            <h5 class="task">
                                <a href="#">Meeting about plan for Admin Template 2018</a>
                            </h5>
                            <span class="time">10:00 AM</span>
                        </div>
                    </div>
                    <div class="au-task__item au-task__item--warning">
                        <div class="au-task__item-inner">
                            <h5 class="task">
                                <a href="#">Create new task for Dashboard</a>
                            </h5>
                            <span class="time">11:00 AM</span>
                        </div>
                    </div>
                    <div class="au-task__item au-task__item--primary">
                        <div class="au-task__item-inner">
                            <h5 class="task">
                                <a href="#">Meeting about plan for Admin Template 2018</a>
                            </h5>
                            <span class="time">02:00 PM</span>
                        </div>
                    </div>
                    <div class="au-task__item au-task__item--success">
                        <div class="au-task__item-inner">
                            <h5 class="task">
                                <a href="#">Create new task for Dashboard</a>
                            </h5>
                            <span class="time">03:30 PM</span>
                        </div>
                    </div>
                    <div class="au-task__item au-task__item--danger js-load-item" style="display: none;">
                        <div class="au-task__item-inner">
                            <h5 class="task">
                                <a href="#">Meeting about plan for Admin Template 2018</a>
                            </h5>
                            <span class="time">10:00 AM</span>
                        </div>
                    </div>
                    <div class="au-task__item au-task__item--warning js-load-item" style="display: none;">
                        <div class="au-task__item-inner">
                            <h5 class="task">
                                <a href="#">Create new task for Dashboard</a>
                            </h5>
                            <span class="time">11:00 AM</span>
                        </div>
                    </div>
                </div>
                <div class="au-task__footer">
                    <button class="au-btn au-btn-load js-load-btn">load more</button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
            <div class="au-card-title" style="background-image:url('images/bg-title-01.jpg');">
                <div class="bg-overlay bg-overlay--blue"></div>
                <h3>
                    <i class="zmdi zmdi-account-calendar"></i>26 April, 2018</h3>
                <button class="au-btn-plus">
                    <i class="zmdi zmdi-plus"></i>
                </button>
            </div>
            <div class="au-task js-list-load">
                <div class="au-task__title">
                    <p>Tasks for John Doe</p>
                </div>
                <div class="au-task-list js-scrollbar3">
                    <div class="au-task__item au-task__item--danger">
                        <div class="au-task__item-inner">
                            <h5 class="task">
                                <a href="#">Meeting about plan for Admin Template 2018</a>
                            </h5>
                            <span class="time">10:00 AM</span>
                        </div>
                    </div>
                    <div class="au-task__item au-task__item--warning">
                        <div class="au-task__item-inner">
                            <h5 class="task">
                                <a href="#">Create new task for Dashboard</a>
                            </h5>
                            <span class="time">11:00 AM</span>
                        </div>
                    </div>
                    <div class="au-task__item au-task__item--primary">
                        <div class="au-task__item-inner">
                            <h5 class="task">
                                <a href="#">Meeting about plan for Admin Template 2018</a>
                            </h5>
                            <span class="time">02:00 PM</span>
                        </div>
                    </div>
                    <div class="au-task__item au-task__item--success">
                        <div class="au-task__item-inner">
                            <h5 class="task">
                                <a href="#">Create new task for Dashboard</a>
                            </h5>
                            <span class="time">03:30 PM</span>
                        </div>
                    </div>
                    <div class="au-task__item au-task__item--danger js-load-item" style="display: none;">
                        <div class="au-task__item-inner">
                            <h5 class="task">
                                <a href="#">Meeting about plan for Admin Template 2018</a>
                            </h5>
                            <span class="time">10:00 AM</span>
                        </div>
                    </div>
                    <div class="au-task__item au-task__item--warning js-load-item" style="display: none;">
                        <div class="au-task__item-inner">
                            <h5 class="task">
                                <a href="#">Create new task for Dashboard</a>
                            </h5>
                            <span class="time">11:00 AM</span>
                        </div>
                    </div>
                </div>
                <div class="au-task__footer">
                    <button class="au-btn au-btn-load js-load-btn">load more</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="container"></div>
@endsection
@push('scripts')

<script type="text/javascript">

    Highcharts.chart('container', {
    chart: {
        height: 600,
        inverted: true
    },

    title: {
        text: 'Highcharts Org Chart'
    },

    accessibility: {
        point: {
            descriptionFormat: '{add index 1}. {toNode.name}' +
                '{#if (ne toNode.name toNode.id)}, {toNode.id}{/if}, ' +
                'reports to {fromNode.id}'
        }
    },

    series: [{
        type: 'organization',
        name: 'Organization Chart',
        keys: ['from', 'to'],
        data: [
            ['Adviser', 'President'],
            ['President', 'VicePresInternal'],
            ['President', 'VicePresExternal'],
            ['President', 'Secretary'],
            ['President', 'Treasurer'],
            ['President', 'Auditor'],
            ['President', 'PIO'],
            ['PIO', 'AndrewFelixOmega'],
            ['President', 'Marshall1'],
            ['Marshall1', 'Marshall2'],
            ['President', 'FirstYearRep1'],
            ['FirstYearRep1', 'FirstYearRep2'],
            ['President', 'SecondYearRep1'],
            ['SecondYearRep1', 'SecondYearRep2'],
            ['President', 'ThirdYearRep1'],
            ['ThirdYearRep1', 'ThirdYearRep2'],
            ['President', 'FourthYearRep1'],
            ['FourthYearRep1', 'FourthYearRep2']
        ],
        levels: [{
            level: 0,  // Adviser at the top
            color: '#d3d3d3',
            dataLabels: {
                color: 'black'
            },
            height: 25
        }, {
            level: 1,  // President second highest
            color: '#ffd700',
            dataLabels: {
                color: 'black'
            },
            height: 25
        }, {
            level: 2,  // VP Internal and VP External third highest
            color: '#ffa500',
            dataLabels: {
                color: 'black'
            },
            height: 25
        }, {
            level: 3,  // Board members come after
            color: '#ff6347',
            dataLabels: {
                color: 'black'
            },
            height: 25
        }, {
            level: 4,  // Representatives at the bottom
            color: '#359154',
            dataLabels: {
                color: 'black'
            }
        }],
        nodes: [{
            id: 'Adviser',
            title: 'Adviser',
            name: 'Ruby Encenzo',
        }, {
            id: 'President',
            title: 'President',
            name: 'Alexa Daniel Montalban',
        }, {
            id: 'VicePresInternal',
            title: 'Vice Pres Internal',
            name: 'Ailyn Boholano',

            level: 2
        }, {
            id: 'VicePresExternal',
            title: 'Vice Pres External',
            name: 'John Luid Abellonar',

            level: 2
        }, {
            id: 'Secretary',
            title: 'Secretary',
            name: 'Jann Rheina B. Latoy',

            level: 3
        }, {
            id: 'Treasurer',
            title: 'Treasurer',
            name: 'Joan Pacaldo',

            level: 3
        }, {
            id: 'Auditor',
            title: 'Auditor',
            name: 'Joann Roa',

            level: 3
        }, {
            id: 'PIO',
            title: 'PIO',
            name: 'Jude Andrade',

            level: 3
        }, {
            id: 'AndrewFelixOmega',
            title: 'Member',
            name: 'Andrew Felix Omega',

            level: 3
        }, {
            id: 'Marshall1',
            title: 'Marshall',
            name: 'Ella Maula',

            level: 3
        }, {
            id: 'Marshall2',
            title: 'Marshall',
            name: 'Jay Napoleon Arizala',

            level: 3
        }, {
            id: 'FirstYearRep1',
            title: 'First Year Rep',
            name: 'Adriane Aldiano',

            level: 4
        }, {
            id: 'FirstYearRep2',
            title: 'First Year Rep',
            name: 'Edison Jede Longkibes',

            level: 4
        }, {
            id: 'SecondYearRep1',
            title: 'Second Year Rep',
            name: 'Keith Gabriel Andales',

            level: 4
        }, {
            id: 'SecondYearRep2',
            title: 'Second Year Rep',
            name: 'Kristine Joy Villasan',

            level: 4
        }, {
            id: 'ThirdYearRep1',
            title: 'Third Year Rep',
            name: 'Cris Dangel',

            level: 4
        }, {
            id: 'ThirdYearRep2',
            title: 'Third Year Rep',
            name: 'Kirt Manzano',

            level: 4
        }, {
            id: 'FourthYearRep1',
            title: 'Fourth Year Rep',
            name: 'Renz Clayford Andoy',

            level: 4
        }, {
            id: 'FourthYearRep2',
            title: 'Fourth Year Rep',
            name: 'Milo Labastida',

            level: 4
        }],
        colorByPoint: false,
        color: '#007ad0',
        dataLabels: {
            color: 'white'
        },
        borderColor: 'white',
        nodeWidth: 'auto'
    }],
    tooltip: {
        outside: true
    },
    exporting: {
        allowHTML: true,
        sourceWidth: 800,
        sourceHeight: 600
    }
});



Highcharts.chart('containerPie', {
    chart: {
        type: 'pie'
    },
    title: {
        text: 'Egg Yolk Composition'
    },
    tooltip: {
        valueSuffix: '%'
    },
    subtitle: {
        text:
        'Source:<a href="https://www.mdpi.com/2072-6643/11/3/684/htm" target="_default">MDPI</a>'
    },
    plotOptions: {
        series: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: [{
                enabled: true,
                distance: 20
            }, {
                enabled: true,
                distance: -40,
                format: '{point.percentage:.1f}%',
                style: {
                    fontSize: '1.2em',
                    textOutline: 'none',
                    opacity: 0.7
                },
                filter: {
                    operator: '>',
                    property: 'percentage',
                    value: 10
                }
            }]
        }
    },
    series: [
        {
            name: 'Percentage',
            colorByPoint: true,
            data: [
                {
                    name: 'Water',
                    y: 55.02
                },
                {
                    name: 'Fat',
                    sliced: true,
                    selected: true,
                    y: 26.71
                },
                {
                    name: 'Carbohydrates',
                    y: 1.09
                },
                {
                    name: 'Protein',
                    y: 15.5
                },
                {
                    name: 'Ash',
                    y: 1.68
                }
            ]
        }
    ]
});

            </script>
@endpush
