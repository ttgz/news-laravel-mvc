@extends('admin.layouts.layout')
@section('title-page', 'Dashboard')
@section('active-index', 'active')
@section('content')
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-comments fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ $totalPost }}</div>
                            <div>Bài viết</div>
                        </div>
                    </div>
                </div>
                <a href="{{ route('post.index') }}">
                    <div class="panel-footer">
                        <span class="pull-left">Xem chi tiết</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-tasks fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ $totalCategory }}</div>
                            <div>Chủ đề bài viết</div>
                        </div>
                    </div>
                </div>
                <a href="{{ route('category.index') }}">
                    <div class="panel-footer">
                        <span class="pull-left">Xem chi tiết</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-shopping-cart fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">124</div>
                            <div>New Orders!</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-support fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">13</div>
                            <div>Support Tickets!</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <canvas id="chartBar" width="700" height="450"></canvas>
        </div>
    </div>
    <class class="row">
        <!-- /.row -->
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Tỉ lệ bài viết trong mỗi danh mục
                </div>
                <!-- /.panel-heading -->
                <canvas id="myPieChart" width="400" height="400"></canvas>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Bảng thống kê số lượng bài viết của danh mục
                </div>

                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên danh mục</th>
                            <th>Số lượng bài viết</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($perOfPostsInCategory as $postsOfCategory)
                            <tr>

                                <td>{{ $postsOfCategory->id }}</td>
                                <td>{{ $postsOfCategory->name }}</td>
                                <td>{{ $postsOfCategory->count }}</td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>

            </div>

        </div>
    </class>

@endsection
@section('script')

    <script>
        // Tạo biểu đồ
        const ctx = document.getElementById('myPieChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: [
                    @foreach ($perOfPostsInCategory as $perOfPosts)
                        '{{ $perOfPosts->name }}',
                    @endforeach
                ],
                datasets: [{
                    label: 'Số lượng',
                    data: [
                        @foreach ($perOfPostsInCategory as $perOfPosts)
                            '{{ $perOfPosts->count }}',
                        @endforeach
                    ],
                    backgroundColor: [
                        @foreach ($colors as $color)
                            '{{ $color }}',
                        @endforeach
                    ]
                }]
            },
            options: {}
        });
    </script>
    <script>
        const chartBar = document.getElementById('chartBar').getContext('2d');      
        const labels = [1,2,3,4,5,6,7];     
        const data = {
            labels: labels,
            datasets: [{
                label: 'My First Dataset',
                data: [65, 59, 80, 81, 56, 55, 40],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    'rgb(201, 203, 207)'
                ],
                borderWidth: 1
            }]
        };
        const config = {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            },
        };
        const chart = new Chart(chartBar,config);
    </script>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/css_admin_index.css') }}">
@endsection
