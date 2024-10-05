<x-layouts.master>
    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Profit or loss</h6>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="reload"></a>
                    <a class="list-icons-item" data-action="remove"></a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <x-data-display.card-toolbar />
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header header-elements-inline">
                            <h6 class="card-title"> <i class="icon-graph mr-2"></i>Expense Report</h6>
                            <div class="header-elements">
                                <div class="list-icons">
                                    <a class="list-icons-item" data-action="collapse"></a>
                                    <a class="list-icons-item" data-action="reload"></a>
                                    <a class="list-icons-item" data-action="remove"></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tbody>
                                    @foreach ($expenseCategories as $category)
                                        <tr>
                                            <td>{{ $category->title }}</td>
                                            <td><x-data-display.amount-display :amount="$category->expense->sum('total_amount')" />
                                            </td>
                                        </tr>
                                    @endforeach

                                    <tr class="bg-indigo-600">
                                        <td><strong>Total Expense</strong></td>
                                        <td><strong>
                                                <x-data-display.amount-display :amount="$expenses->sum('total_amount')" />
                                            </strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header header-elements-inline">
                            <h5 class="card-title">Expense chart</h5>
                            <div class="header-elements">
                                <div class="list-icons">
                                    <a class="list-icons-item" data-action="collapse"></a>
                                    <a class="list-icons-item" data-action="reload"></a>
                                    <a class="list-icons-item" data-action="remove"></a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="chart-container">
                                <div class="chart has-fixed-height" id="columns_basic"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            @push('css')
                <script src="{{ asset('limitless/global_assets/js/plugins/visualization/echarts/echarts.min.js') }}"></script>
            @endpush

            @push('scripts')
                <script>
                    var monthlyExpenses = @json($chartData['monthlyExpenses']);
                    var monthNames = @json($chartData['monthNames']);

                    var EchartsColumnsBasicLight = function() {
                        var _columnsBasicLightExample = function() {
                            if (typeof echarts == 'undefined') {
                                console.warn('Warning - echarts.min.js is not loaded.');
                                return;
                            }

                            var columns_basic_element = document.getElementById('columns_basic');

                            if (columns_basic_element) {
                                var columns_basic = echarts.init(columns_basic_element);

                                columns_basic.setOption({
                                    color: ['#2ec7c9'],
                                    textStyle: {
                                        fontFamily: 'Roboto, Arial, Verdana, sans-serif',
                                        fontSize: 13
                                    },
                                    animationDuration: 750,
                                    grid: {
                                        left: 0,
                                        right: 40,
                                        top: 35,
                                        bottom: 0,
                                        containLabel: true
                                    },
                                    legend: {
                                        data: ['Expenses'],
                                        itemHeight: 8,
                                        itemGap: 20,
                                        textStyle: {
                                            padding: [0, 5]
                                        }
                                    },
                                    tooltip: {
                                        trigger: 'axis',
                                        backgroundColor: 'rgba(0,0,0,0.75)',
                                        padding: [10, 15],
                                        textStyle: {
                                            fontSize: 13,
                                            fontFamily: 'Roboto, sans-serif'
                                        }
                                    },
                                    xAxis: [{
                                        type: 'category',
                                        data: monthNames,
                                        axisLabel: {
                                            color: '#333'
                                        },
                                        axisLine: {
                                            lineStyle: {
                                                color: '#999'
                                            }
                                        },
                                        splitLine: {
                                            show: true,
                                            lineStyle: {
                                                color: '#eee',
                                                type: 'dashed'
                                            }
                                        }
                                    }],
                                    yAxis: [{
                                        type: 'value',
                                        axisLabel: {
                                            color: '#333'
                                        },
                                        axisLine: {
                                            lineStyle: {
                                                color: '#999'
                                            }
                                        },
                                        splitLine: {
                                            lineStyle: {
                                                color: ['#eee']
                                            }
                                        },
                                        splitArea: {
                                            show: true,
                                            areaStyle: {
                                                color: ['rgba(250,250,250,0.1)', 'rgba(0,0,0,0.01)']
                                            }
                                        }
                                    }],
                                    series: [{
                                        name: 'Expenses',
                                        type: 'bar',
                                        data: monthlyExpenses,
                                        itemStyle: {
                                            normal: {
                                                label: {
                                                    show: true,
                                                    position: 'top',
                                                    textStyle: {
                                                        fontWeight: 500
                                                    }
                                                }
                                            }
                                        },
                                        markLine: {
                                            data: [{
                                                type: 'average',
                                                name: 'Average'
                                            }]
                                        }
                                    }]
                                });
                            }

                            var triggerChartResize = function() {
                                columns_basic_element && columns_basic.resize();
                            };

                            var sidebarToggle = document.querySelector('.sidebar-control');
                            sidebarToggle && sidebarToggle.addEventListener('click', triggerChartResize);

                            var resizeCharts;
                            window.addEventListener('resize', function() {
                                clearTimeout(resizeCharts);
                                resizeCharts = setTimeout(function() {
                                    triggerChartResize();
                                }, 200);
                            });
                        };

                        return {
                            init: function() {
                                _columnsBasicLightExample();
                            }
                        }
                    }();

                    document.addEventListener('DOMContentLoaded', function() {
                        EchartsColumnsBasicLight.init();
                    });
                </script>
            @endpush

        </div>
    </div>
</x-layouts.master>
