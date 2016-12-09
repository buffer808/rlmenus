<div class="dashboard index row">
    <div class="col-md-12">

        <div class="page-header">
            <h1><?php echo __('Dashboard'); ?></h1>
        </div>


        <div class="row">

            <div class="col-md-6">
                <!-- AREA CHART -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Feedbacks chart</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="chart">
                            <canvas id="areaChart" style="height:320px"></canvas>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>

            <div class="clearfix"></div>
            
            <!-- ORDERS -->
            <div class="col-sm-3">
                <div class="small-box">
                    <div class="inner">
                        <h3>49</h3>
                        <p>Orders Today</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-cart"></i>
                    </div>
                    <div class="bg-red">
                        <a href="#" class="small-box-footer">
                            View Orders <i class="ion ion-chevron-right"></i>
                        </a>
                    </div>
                </div><!-- /.small box -->

                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>68</h3>

                        <p>Orders Tomorrow</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-shopping-cart"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        View Orders <i class="ion ion-chevron-right"></i>
                    </a>
                </div><!-- /.small box -->

                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="ion ion-android-cart"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-number lg">254</span>
                        <span class="info-box-text no-txt-transform">Orders Received</span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->

            </div><!-- /.col -->

            <!-- FEEDBACK -->
            <div class="col-sm-3">

                <div class="small-box">
                    <div class="inner">
                        <h3>74</h3>
                        <p>Pending Feedbacks</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-chatbubbles"></i>
                    </div>
                    <div class="bg-purple">
                        <a href="#" class="small-box-footer">
                            View Feedbacks <i class="ion ion-chevron-right"></i>
                        </a>
                    </div>
                </div><!-- /.small box -->

                <div class="small-box bg-purple">
                    <div class="inner">
                        <h3>224</h3>

                        <p>Feedbacks</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-chatbubbles"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        View Feedbacks <i class="ion ion-chevron-right"></i>
                    </a>
                </div><!-- /.small box -->

                <div class="info-box">
                    <span class="info-box-icon bg-purple"><i class="ion ion-chatbubbles"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-number lg">150</span>
                        <span class="info-box-text no-txt-transform">Resolved Feedbacks</span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->

            </div><!-- /.col -->

            <!-- MESSAGES -->
            <div class="col-sm-3">

                <div class="small-box">
                    <div class="inner">
                        <h3>12</h3>
                        <p>New Messages</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios-email"></i>
                    </div>
                    <div class="bg-green">
                        <a href="#" class="small-box-footer">
                            View Messages <i class="ion ion-chevron-right"></i>
                        </a>
                    </div>
                </div><!-- /.small box -->

                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>224</h3>

                        <p>Messages</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios-email"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        View Messages <i class="ion ion-chevron-right"></i>
                    </a>
                </div><!-- /.small box -->

                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="ion ion-ios-email"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-number lg">189</span>
                        <span class="info-box-text no-txt-transform">Read Messages</span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->

            </div><!-- /.col -->

            <!-- DELIVERY -->
            <div class="col-sm-3">
                <div class="small-box">
                  <div class="inner">
                    <h3>18</h3>

                    <p>Pending for Delivery</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-truck"></i>
                  </div>
                  <div class="bg-aqua">
                      <a href="#" class="small-box-footer">
                        View Delivery <i class="ion ion-chevron-right"></i>
                      </a>
                  </div>
                </div><!-- /.small box -->

                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>16</h3>

                        <p>Deliveries</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-truck"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        View Messages <i class="ion ion-chevron-right"></i>
                    </a>
                </div><!-- /.small box -->

                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-truck"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-number lg">63</span>
                        <span class="info-box-text no-txt-transform">Orders Delivered</span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->

            </div><!-- /.col -->

        </div><!-- /.row -->


    </div>
</div><!-- end containing of content -->