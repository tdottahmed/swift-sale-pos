<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Purchse and sale</h5>
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
        var monthlyPurchases = @json($chartData['monthlyPurchases']);
        var monthlySales = @json($chartData['monthlySales']);
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
                        color: ['#2ec7c9', '#b6a2de'],
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
                            data: ['Purchase', 'Sale'],
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
                                name: 'Purchase',
                                type: 'bar',
                                data: monthlyPurchases,
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
                            },
                            {
                                name: 'Sale',
                                type: 'bar',
                                data: monthlySales,
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
                            }
                        ]
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
