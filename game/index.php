<?php

define('Name','首頁');

?>

<!DOCTYPE html>
<html>
  <?php require "includes/header.inc.php"?>   <!-- header檔案 -->
  <body class="bg-1">

    <!-- Preloader -->
    <div class="mask"><div id="loader"></div></div>
    <!--/Preloader -->

    <!-- Wrap all page content here -->
    <div id="wrap">

      <!-- Make page fluid -->
      <div class="row">

        <!-- Fixed navbar -->
        <div class="navbar navbar-default navbar-fixed-top navbar-transparent-black mm-fixed-top" role="navigation" id="navbar">

        <!-- Branding -->
          <?php require "includes/branding.inc.php"; ?>      <!--左上標題-->
        <!--Branding end-->

          <!-- .nav-collapse -->
          <div class="navbar-collapse">

            <!-- Page refresh -->
            <ul class="nav navbar-nav refresh">
              <li class="divided">
                <a href="#" class="page-refresh"><i class="fa fa-refresh"></i></a>
              </li>
            </ul>
            <!-- /Page refresh -->

            <!-- Search -->
            <!--<div class="search" id="main-search">
              <i class="fa fa-search"></i> <input type="text" placeholder="Search...">
            </div>-->
            <!-- Search end -->

            <!-- Quick Actions -->
            <?php require "includes/quick_action.inc.php";?>    <!--最上欄檔案-->
            <!-- /Quick Actions -->

            <!-- Sidebar -->
                <?php require "includes/siderbar.inc.php"?>     <!-- 側邊欄檔案 -->
            <!-- Sidebar end -->

          </div>
          <!--/.nav-collapse -->

        </div>
        <!-- Fixed navbar end -->

        <!-- Page content -->
        <div id="content" class="col-md-12">

          <!-- page header -->
          <?php require "includes/page_header.inc.php";?>   <!--每頁大標題-->
          <!-- /page header -->

          <!-- content main container -->
          <div class="main">




            <!-- row -->
            <div class="row">


              <!-- col 12 -->
              <div class="col-md-12">


                <!-- tile -->
                <section class="tile transparent">


                  <!-- tile header -->
                  <div class="tile-header transparent">
                    <h1><strong>戰役</strong></h1>
                    <!-- <span class="note"><span class="italic"></span></span> -->
                    <div class="controls">
                      <a href="#" class="refresh"><i class="fa fa-refresh"></i></a>
                      <a href="#" class="remove"><i class="fa fa-times"></i></a>
                    </div>
                  </div>
                  <!-- /tile header -->

                  <!-- tile body -->
                  <div class="tile-body color transparent-black rounded-corners">

                    <div class="table-responsive">
                      <table  class="table table-datatable table-custom" id="basicDataTable">
                        <thead>
                          <tr>
                            <th class="sort-numeric">章節</th>
                            <th class="sort-alpha">章節名稱</th>
                            <th class="sort-amount">完成度</th>
                            <th class="">掉落物品</th>
                          </tr>
                        </thead>
                        <tbody>
                            <tr>
                              <td>1</td>
                              <td>斯卡城</td>
                              <td class="progress-cell">
                                <div class="progress-info">
                                  <div class="percent"><span class="animate-number" data-value="50" data-animation-duration="1500">0</span>%</div>
                                </div>
                                <div class="progress progress-little">
                                  <div class="progress-bar progress-bar-transparent-white animate-progress-bar" data-percentage="50%"></div>
                                </div>
                              </td>
                              <td>長老的裝備、迪雷德爾草、史萊姆殘渣、破舊布</td>
                            </tr>
                            <tr>
                              <td>2</td>
                              <td>安葛什森林</td>
                              <td class="progress-cell">
                                <div class="progress-info">
                                  <div class="percent"><span class="animate-number" data-value="0" data-animation-duration="1500">0</span>%</div>
                                </div>
                                <div class="progress progress-little">
                                  <div class="progress-bar progress-bar-transparent-white animate-progress-bar" data-percentage="0%"></div>
                                </div>
                              </td>
                              <td>長老的裝備、迪雷德爾草、史萊姆殘渣、破舊布</td>
                            </tr>
                            <tr>
                              <td>3</td>
                              <td>荒漠大地</td>
                              <td class="progress-cell">
                                <div class="progress-info">
                                  <div class="percent"><span class="animate-number" data-value="0" data-animation-duration="1500">0</span>%</div>
                                </div>
                                <div class="progress progress-little">
                                  <div class="progress-bar progress-bar-transparent-white animate-progress-bar" data-percentage="0%"></div>
                                </div>
                              </td>
                              <td>長老的裝備、迪雷德爾草、史萊姆殘渣、破舊布</td>
                            </tr>
                            <tr>
                              <td>4</td>
                              <td>浪潮聖地</td>
                              <td class="progress-cell">
                                <div class="progress-info">
                                  <div class="percent"><span class="animate-number" data-value="0" data-animation-duration="1500">0</span>%</div>
                                </div>
                                <div class="progress progress-little">
                                  <div class="progress-bar progress-bar-transparent-white animate-progress-bar" data-percentage="0%"></div>
                                </div>
                              </td>
                              <td>長老的裝備、迪雷德爾草、史萊姆殘渣、破舊布</td>
                            </tr>
                            <tr>
                              <td>5</td>
                              <td>煉獄世界</td>
                              <td class="progress-cell">
                                <div class="progress-info">
                                  <div class="percent"><span class="animate-number" data-value="0" data-animation-duration="1500">0</span>%</div>
                                </div>
                                <div class="progress progress-little">
                                  <div class="progress-bar progress-bar-transparent-white animate-progress-bar" data-percentage="0%"></div>
                                </div>
                              </td>
                              <td>長老的裝備、迪雷德爾草、史萊姆殘渣、史萊珠、破舊布</td>
                            </tr>
                            <tr>
                              <td>6</td>
                              <td>兩屆之地</td>
                              <td class="progress-cell">
                                <div class="progress-info">
                                  <div class="percent"><span class="animate-number" data-value="0" data-animation-duration="1500">0</span>%</div>
                                </div>
                                <div class="progress progress-little">
                                  <div class="progress-bar progress-bar-transparent-white animate-progress-bar" data-percentage="0%"></div>
                                </div>
                              </td>
                              <td>長老的裝備、迪雷德爾草、史萊姆殘渣、史萊珠、破舊布</td>
                            </tr>
                          </tbody>
                      </table>
                    </div>

                  </div>
                  <!-- /tile body -->



                </section>

                <!-- /tile -->


                <!-- tile -->
                <section class="tile transparent">
                  <!-- tile body -->
                  <div class="tile-body color transparent-white rounded-bottom-corners">
                      <div class="row">
                        <ul class="inline">
                          
                          <li class="col-md-8 col-sm-12 col-xs-12 text-center">
                            
                            <h4 class="underline text-left"><strong>採集</strong></h4>
                            
                            <div class="inner-container inline">
                              <div data-percent="100" data-size="140" class="pie-chart inline" data-scale-color="false" data-track-color="rgba(0,0,0,0)" data-bar-color="#ffffff" data-line-width="5">
                                <div class="text-center">
                                  <i class="fas fa-coins fa-5x"></i>
                                </div>
                              </div>
                              <p class="chart-overall text-center medium-thin uppercase"><span class="big-medium animate-number" data-value="1000" data-animation-duration="2500">0</span>金幣</p>
                            </div>
  
  
                            <div class="inner-container inline">
                              <div data-percent="85" data-size="140" class="pie-chart inline" data-scale-color="false" data-track-color="rgba(0,0,0,0)" data-bar-color="rgba(0,0,0,.4)" data-line-width="5">
                                <div class="text-center">
                                  <span><i class="fas fa-people-carry fa-5x color-transparent-black"></i></span>
                                </div>
                              </div>
                              <p class="chart-overall text-center medium-thin uppercase color-transparent-black"><span class="big-medium animate-number" data-value="24" data-animation-duration="2500">0</span>工人</p>
                            </div>
  
                          </li>
  
                          <li class="col-md-4 col-sm-12 col-xs-12">
                            <h4 class="underline"><strong>地區狀態</strong></h4>
                            <ul class="progress-list">
                              <li>
                                <div class="details">
                                  <div class="title">寒冰山谷</div>
                                  <div class="description">Lv. 10</div>
                                </div>
                                <div class="status pull-right">
                                  <span class="animate-number" data-value="40" data-animation-duration="1500">0</span>個材料
                                </div>
                                <div class="clearfix"></div>
                                <div class="progress progress-little">
                                  <div class="progress-bar progress-bar-green animate-progress-bar" data-percentage="40%" style="width: 0%;"></div>
                                </div>
                              </li>
                              <li>
                                <div class="details">
                                  <div class="title">幽暗礦山</div>
                                  <div class="description">Lv. 20</div>
                                </div>
                                <div class="status pull-right">
                                   <span class="animate-number" data-value="38" data-animation-duration="1000">0</span>個材料
                                </div>
                                <div class="clearfix"></div>
                                <div class="progress progress-little">
                                  <div class="progress-bar progress-bar-cyan animate-progress-bar" data-percentage="35%" style="width: 0%;"></div>
                                </div>
                              </li>
                              <li>
                                <div class="details">
                                  <div class="title">泊瑟芬樹林</div>
                                  <div class="description">Lv. 30</div>
                                </div>
                                <div class="status pull-right">
                                  <span class="animate-number" data-value="12" data-animation-duration="800">0</span>個材料
                                </div>
                                <div class="clearfix"></div>
                                <div class="progress progress-little">
                                  <div class="progress-bar progress-bar-amethyst animate-progress-bar" data-percentage="12%" style="width: 0%;"></div>
                                </div>
                              </li>
                              <li>
                                <div class="details">
                                  <div class="title">芬里爾獵場</div>
                                  <div class="description">Lv. 40</div>
                                </div>
                                <div class="status pull-right">
                                  <span class="animate-number" data-value="7" data-animation-duration="600">0</span>個材料
                                </div>
                                <div class="clearfix"></div>
                                <div class="progress progress-little">
                                  <div class="progress-bar progress-bar-orange animate-progress-bar" data-percentage="7%" style="width: 0%;"></div>
                                </div>
                              </li>
                              <li>
                                <div class="details">
                                  <div class="title">聖龍棲息地</div>
                                  <div class="description">Lv. 50</div>
                                </div>
                                <div class="status pull-right">
                                  <span class="animate-number" data-value="6" data-animation-duration="400">0</span>個材料
                                </div>
                                <div class="clearfix"></div>
                                <div class="progress progress-little">
                                  <div class="progress-bar progress-bar-red animate-progress-bar" data-percentage="6%" style="width: 0%;"></div>
                                </div>
                              </li>       
                            </ul>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <!-- /tile body -->


                  

                </section>
                <!-- /tile -->
                




                <section class="tile transparent recent-activity">




                    <!-- tile header -->
                    <div class="tile-header transparent">               
                      <h1><strong>決鬥場</strong></h1>
                      <div class="controls">
                        <a href="#" class="refresh"><i class="fa fa-refresh"></i></a>
                        <a href="#" class="remove"><i class="fa fa-times"></i></a>
                      </div>
                    </div>
                    <!-- /tile header -->
  
  
                    
                    <!-- tile widget -->
                    <div class="tile-widget color transparent-black rounded-top-corners nopadding">
                      <!-- Nav tabs -->
                      <ul class="nav nav-tabs tabdrop">
                        <li class="active"><a href="#users-tab" data-toggle="tab">防守</a></li>
                        <li><a href="#tasks-tab" data-toggle="tab">攻擊</a></li>
                      </ul>
                      <!-- / Nav tabs -->
                    </div>
                    <!-- /tile widget -->
  
  
  
  
                    <!-- tile body -->
                    <div class="tile-body tab-content nopadding rounded-bottom-corners">
                      <!-- Tab panes -->
                      
                      <ul id="users-tab" class="tab-pane fade in active">
                        <li>
                          <img src="../images/warrior_pic.png" class="w35" alt>
                          <span class="user font-slab">Peter <strong>Kay</strong></span>
                          <span class="subject">對你進行了攻擊<strong class="win"> 防守勝利</strong></span>
                          <span class="time"><i class="fas fa-clock"></i> 15 分鐘前</span>
                        </li>
                        <li>
                          <img src="../images/archer_pic.png" class="w35" alt>
                          <span class="user font-slab">Arnold <strong>Karlsberg</strong></span>
                          <span class="subject">對你進行了攻擊<strong class="lose"> 防守失敗</strong></span>
                          <span class="time"><i class="fa fa-clock"></i> 30 分鐘前</span>
                        </li>
                        <li>
                          <img src="../images/knight_pic.png" class="w35" alt>
                          <span class="user font-slab">Arnold <strong>Karlsberg</strong></span>
                          <span class="subject">對你進行了攻擊<strong class="win"> 防守勝利</strong></span>
                          <span class="time"><i class="fa fa-clock"></i> 31 分鐘前</span>
                        </li>
                        <li>
                          <img src="../images/knight_pic.png" class="w35" alt>
                          <span class="user font-slab">Ing. Imrich <strong>Kamarel</strong></span>
                          <span class="subject">對你進行了攻擊<strong class="win"> 防守勝利</strong></span>
                          <span class="time"><i class="fa fa-clock"></i> 34 分鐘前</span>
                        </li>
                        <li>
                          <img src="../images/warrior_pic.png" class="w35" alt>
                          <span class="user font-slab">Arnold <strong>Karlsberg</strong></span>
                          <span class="subject">對你進行了攻擊<strong class="win"> 防守勝利</strong></span>
                          <span class="time"><i class="fa fa-clock"></i> 41 分鐘前</span>
                        </li> 
                        <li>
                          <img src="../images/archer_pic.png" class="w35" alt>
                          <span class="user font-slab">Peter <strong>Kay</strong></span>
                          <span class="subject">對你進行了攻擊<strong class="lose"> 防守失敗</strong></span>
                          <span class="time"><i class="fa fa-clock"></i> 46 分鐘前</span>
                        </li>
                        <li>
                          <img src="../images/warrior_pic.png" class="w35" alt>
                          <span class="user font-slab">Peter <strong>Kay</strong></span>
                          <span class="subject">對你進行了攻擊<strong class="win"> 防守勝利</strong></span>
                          <span class="time"><i class="fa fa-clock"></i> 50 分鐘前</span>
                        </li>
                      </ul>
  
                     
  
                      <ul id="tasks-tab" class="tab-pane fade">
                        <li>
                          <img src="../images/archer_pic.png" class="w35" alt>
                          <span class="user font-slab"><strong>You</strong></span>
                          <span class="subject">攻擊了</span>
                          <span class="font-slab"><strong>XXX</strong></span>
                          <span class="subject"><strong class="win"> 勝利</strong></span>
                          <span class="time"><i class="fa fa-clock"></i> 15 分鐘前</span>
                        </li>
                        <li>
                            <img src="../images/archer_pic.png" class="w35" alt>
                            <span class="user font-slab"><strong>You</strong></span>
                            <span class="subject">攻擊了</span>
                            <span class="font-slab"><strong>XXX</strong></span>
                            <span class="subject"><strong class="win"> 勝利</strong></span>
                            <span class="time"><i class="fa fa-clock"></i> 20 分鐘前</span>
                        </li>
                        <li>
                              <img src="../images/archer_pic.png" class="w35" alt>
                              <span class="user font-slab"><strong>You</strong></span>
                              <span class="subject">攻擊了</span>
                              <span class="font-slab"><strong>XXX</strong></span>
                              <span class="subject"><strong class="win"> 勝利</strong></span>
                              <span class="time"><i class="fa fa-clock"></i> 29 分鐘前</span>
                        </li>
                        <li>
                          <img src="../images/archer_pic.png" class="w35" alt>
                          <span class="user font-slab"><strong>You</strong></span>
                          <span class="subject">攻擊了</span>
                          <span class="font-slab"><strong>XXX</strong></span>
                          <span class="subject"><strong class="lose"> 失敗</strong></span>
                          <span class="time"><i class="fa fa-clock"></i> 45 分鐘前</span>
                        </li>
                        <li>
                            <img src="../images/archer_pic.png" class="w35" alt>
                            <span class="user font-slab"><strong>You</strong></span>
                            <span class="subject">攻擊了</span>
                            <span class="font-slab"><strong>XXX</strong></span>
                            <span class="subject"><strong class="lose"> 失敗</strong></span>
                            <span class="time"><i class="fa fa-clock"></i> 昨天</span>
                        </li>
                        <li>
                              <img src="../images/archer_pic.png" class="w35" alt>
                              <span class="user font-slab"><strong>You</strong></span>
                              <span class="subject">攻擊了</span>
                              <span class="font-slab"><strong>XXX</strong></span>
                              <span class="subject"><strong class="win"> 勝利</strong></span>
                              <span class="time"><i class="fa fa-clock"></i> 昨天</span>
                        </li>
                      </ul>
                      <!-- / Tab panes -->
                    </div>
                    <!-- /tile body -->
                  
  
  
                  </section>
                  <!-- /tile -->

              </div>
              <!-- /col 12 -->



            </div>
            <!-- /row -->



          </div>
          <!-- /content container -->






        </div>
        <!-- Page content end -->




        <div id="mmenu" class="right-panel">
          <!-- Nav tabs -->
          <ul class="nav nav-tabs nav-justified">
            <li class="active"><a href="#mmenu-users" data-toggle="tab"><i class="fa fa-users"></i></a></li>
            <li class=""><a href="#mmenu-history" data-toggle="tab"><i class="fa fa-clock-o"></i></a></li>
            <li class=""><a href="#mmenu-friends" data-toggle="tab"><i class="fa fa-heart"></i></a></li>
            <li class=""><a href="#mmenu-settings" data-toggle="tab"><i class="fa fa-gear"></i></a></li>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content">
            <div class="tab-pane active" id="mmenu-users">
              <h5><strong>Online</strong> Users</h5>

              <ul class="users-list">

                <li class="online">
                  <div class="media">
                    <a class="pull-left profile-photo" href="#">
                      <img class="media-object" src="assets/images/ici-avatar.jpg" alt>
                    </a>
                    <div class="media-body">
                      <h6 class="media-heading">Ing. Imrich <strong>Kamarel</strong></h6>
                      <small><i class="fa fa-map-marker"></i> Ulaanbaatar, Mongolia</small>
                      <span class="badge badge-outline status"></span>
                    </div>
                  </div>
                </li>

                <li class="online">
                  <div class="media">

                    <a class="pull-left profile-photo" href="#">
                      <img class="media-object" src="assets/images/arnold-avatar.jpg" alt>
                    </a>
                    <span class="badge badge-red unread">3</span>

                    <div class="media-body">
                      <h6 class="media-heading">Arnold <strong>Karlsberg</strong></h6>
                      <small><i class="fa fa-map-marker"></i> Bratislava, Slovakia</small>
                      <span class="badge badge-outline status"></span>
                    </div>

                  </div>
                </li>

                <li class="online">
                  <div class="media">
                    <a class="pull-left profile-photo" href="#">
                      <img class="media-object" src="assets/images/peter-avatar.jpg" alt>

                    </a>
                    <div class="media-body">
                      <h6 class="media-heading">Peter <strong>Kay</strong></h6>
                      <small><i class="fa fa-map-marker"></i> Kosice, Slovakia</small>
                      <span class="badge badge-outline status"></span>
                    </div>
                  </div>
                </li>

                <li class="online">
                  <div class="media">
                    <a class="pull-left profile-photo" href="#">
                      <img class="media-object" src="assets/images/george-avatar.jpg" alt>
                    </a>
                    <div class="media-body">
                      <h6 class="media-heading">George <strong>McCain</strong></h6>
                      <small><i class="fa fa-map-marker"></i> Prague, Czech Republic</small>
                      <span class="badge badge-outline status"></span>
                    </div>
                  </div>
                </li>

                <li class="busy">
                  <div class="media">
                    <a class="pull-left profile-photo" href="#">
                      <img class="media-object" src="assets/images/random-avatar1.jpg" alt>
                    </a>
                    <div class="media-body">
                      <h6 class="media-heading">Lucius <strong>Cashmere</strong></h6>
                      <small><i class="fa fa-map-marker"></i> Wien, Austria</small>
                      <span class="badge badge-outline status"></span>
                    </div>
                  </div>
                </li>

                <li class="busy">
                  <div class="media">
                    <a class="pull-left profile-photo" href="#">
                      <img class="media-object" src="assets/images/random-avatar2.jpg" alt>
                    </a>
                    <div class="media-body">
                      <h6 class="media-heading">Jesse <strong>Phoenix</strong></h6>
                      <small><i class="fa fa-map-marker"></i> Berlin, Germany</small>
                      <span class="badge badge-outline status"></span>
                    </div>
                  </div>
                </li>

              </ul>

              <h5><strong>Offline</strong> Users</h5>

              <ul class="users-list">

                <li class="offline">
                  <div class="media">
                    <a class="pull-left profile-photo" href="#">
                      <img class="media-object" src="assets/images/random-avatar4.jpg" alt>
                    </a>
                    <div class="media-body">
                      <h6 class="media-heading">Dell <strong>MacApple</strong></h6>
                      <small><i class="fa fa-map-marker"></i> Paris, France</small>
                      <span class="badge badge-outline status"></span>
                    </div>
                  </div>
                </li>

                <li class="offline">
                  <div class="media">

                    <a class="pull-left profile-photo" href="#">
                      <img class="media-object" src="assets/images/random-avatar5.jpg" alt>
                    </a>

                    <div class="media-body">
                      <h6 class="media-heading">Roger <strong>Flopple</strong></h6>
                      <small><i class="fa fa-map-marker"></i> Rome, Italia</small>
                      <span class="badge badge-outline status"></span>
                    </div>

                  </div>
                </li>

                <li class="offline">
                  <div class="media">
                    <a class="pull-left profile-photo" href="#">
                      <img class="media-object" src="assets/images/random-avatar6.jpg" alt>

                    </a>
                    <div class="media-body">
                      <h6 class="media-heading">Nico <strong>Vulture</strong></h6>
                      <small><i class="fa fa-map-marker"></i> Kyjev, Ukraine</small>
                      <span class="badge badge-outline status"></span>
                    </div>
                  </div>
                </li>

                <li class="offline">
                  <div class="media">
                    <a class="pull-left profile-photo" href="#">
                      <img class="media-object" src="assets/images/random-avatar7.jpg" alt>
                    </a>
                    <div class="media-body">
                      <h6 class="media-heading">Bobby <strong>Socks</strong></h6>
                      <small><i class="fa fa-map-marker"></i> Moscow, Russia</small>
                      <span class="badge badge-outline status"></span>
                    </div>
                  </div>
                </li>

                <li class="offline">
                  <div class="media">
                    <a class="pull-left profile-photo" href="#">
                      <img class="media-object" src="assets/images/random-avatar8.jpg" alt>
                    </a>
                    <div class="media-body">
                      <h6 class="media-heading">Anna <strong>Opichia</strong></h6>
                      <small><i class="fa fa-map-marker"></i> Budapest, Hungary</small>
                      <span class="badge badge-outline status"></span>
                    </div>
                  </div>
                </li>

              </ul>

            </div>

            <div class="tab-pane" id="mmenu-history">
              <h5><strong>Chat</strong> History</h5>

              <ul class="history-list">

                <li class="online">
                  <div class="media">
                    <a class="pull-left profile-photo" href="#">
                      <img class="media-object" src="assets/images/ici-avatar.jpg" alt>
                    </a>
                    <div class="media-body">
                      <h6 class="media-heading">Ing. Imrich <strong>Kamarel</strong></h6>
                      <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</small>
                      <span class="badge badge-outline status"></span>
                    </div>
                  </div>
                </li>

                <li class="busy">
                  <div class="media">

                    <a class="pull-left profile-photo" href="#">
                      <img class="media-object" src="assets/images/arnold-avatar.jpg" alt>
                    </a>
                    <span class="badge badge-red unread">3</span>

                    <div class="media-body">
                      <h6 class="media-heading">Arnold <strong>Karlsberg</strong></h6>
                      <small>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</small>
                      <span class="badge badge-outline status"></span>
                    </div>

                  </div>
                </li>

                <li class="offline">
                  <div class="media">
                    <a class="pull-left profile-photo" href="#">
                      <img class="media-object" src="assets/images/peter-avatar.jpg" alt>

                    </a>
                    <div class="media-body">
                      <h6 class="media-heading">Peter <strong>Kay</strong></h6>
                      <small>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit </small>
                      <span class="badge badge-outline status"></span>
                    </div>
                  </div>
                </li>

              </ul>

            </div>

            <div class="tab-pane" id="mmenu-friends">
              <h5><strong>Friends</strong> List</h5>
                <ul class="favourite-list">

                <li class="online">
                  <div class="media">

                    <a class="pull-left profile-photo" href="#">
                      <img class="media-object" src="assets/images/arnold-avatar.jpg" alt>
                    </a>
                    <span class="badge badge-red unread">3</span>

                    <div class="media-body">
                      <h6 class="media-heading">Arnold <strong>Karlsberg</strong></h6>
                      <small><i class="fa fa-map-marker"></i> Bratislava, Slovakia</small>
                      <span class="badge badge-outline status"></span>
                    </div>

                  </div>
                </li>

                <li class="offline">
                  <div class="media">
                    <a class="pull-left profile-photo" href="#">
                      <img class="media-object" src="assets/images/random-avatar8.jpg" alt>
                    </a>
                    <div class="media-body">
                      <h6 class="media-heading">Anna <strong>Opichia</strong></h6>
                      <small><i class="fa fa-map-marker"></i> Budapest, Hungary</small>
                      <span class="badge badge-outline status"></span>
                    </div>
                  </div>
                </li>

                <li class="busy">
                  <div class="media">
                    <a class="pull-left profile-photo" href="#">
                      <img class="media-object" src="assets/images/random-avatar1.jpg" alt>
                    </a>
                    <div class="media-body">
                      <h6 class="media-heading">Lucius <strong>Cashmere</strong></h6>
                      <small><i class="fa fa-map-marker"></i> Wien, Austria</small>
                      <span class="badge badge-outline status"></span>
                    </div>
                  </div>
                </li>

                <li class="online">
                  <div class="media">
                    <a class="pull-left profile-photo" href="#">
                      <img class="media-object" src="assets/images/ici-avatar.jpg" alt>
                    </a>
                    <div class="media-body">
                      <h6 class="media-heading">Ing. Imrich <strong>Kamarel</strong></h6>
                      <small><i class="fa fa-map-marker"></i> Ulaanbaatar, Mongolia</small>
                      <span class="badge badge-outline status"></span>
                    </div>
                  </div>
                </li>

              </ul>
            </div>

            <div class="tab-pane pane-settings" id="mmenu-settings">
              <h5><strong>Chat</strong> Settings</h5>

              <ul class="settings">

                <li>
                  <div class="form-group">
                    <label class="col-xs-8 control-label">Show Offline Users</label>
                    <div class="col-xs-4 control-label">
                      <div class="onoffswitch greensea">
                        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="show-offline" checked="">
                        <label class="onoffswitch-label" for="show-offline">
                          <span class="onoffswitch-inner"></span>
                          <span class="onoffswitch-switch"></span>
                        </label>
                      </div>
                    </div>
                  </div>
                </li>

                <li>
                  <div class="form-group">
                    <label class="col-xs-8 control-label">Show Fullname</label>
                    <div class="col-xs-4 control-label">
                      <div class="onoffswitch greensea">
                        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="show-fullname">
                        <label class="onoffswitch-label" for="show-fullname">
                          <span class="onoffswitch-inner"></span>
                          <span class="onoffswitch-switch"></span>
                        </label>
                      </div>
                    </div>
                  </div>
                </li>

                <li>
                  <div class="form-group">
                    <label class="col-xs-8 control-label">History Enable</label>
                    <div class="col-xs-4 control-label">
                      <div class="onoffswitch greensea">
                        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="show-history" checked="">
                        <label class="onoffswitch-label" for="show-history">
                          <span class="onoffswitch-inner"></span>
                          <span class="onoffswitch-switch"></span>
                        </label>
                      </div>
                    </div>
                  </div>
                </li>

                <li>
                  <div class="form-group">
                    <label class="col-xs-8 control-label">Show Locations</label>
                    <div class="col-xs-4 control-label">
                      <div class="onoffswitch greensea">
                        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="show-location" checked="">
                        <label class="onoffswitch-label" for="show-location">
                          <span class="onoffswitch-inner"></span>
                          <span class="onoffswitch-switch"></span>
                        </label>
                      </div>
                    </div>
                  </div>
                </li>

                <li>
                  <div class="form-group">
                    <label class="col-xs-8 control-label">Notifications</label>
                    <div class="col-xs-4 control-label">
                      <div class="onoffswitch greensea">
                        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="show-notifications">
                        <label class="onoffswitch-label" for="show-notifications">
                          <span class="onoffswitch-inner"></span>
                          <span class="onoffswitch-switch"></span>
                        </label>
                      </div>
                    </div>
                  </div>
                </li>

                <li>
                  <div class="form-group">
                    <label class="col-xs-8 control-label">Show Undread Count</label>
                    <div class="col-xs-4 control-label">
                      <div class="onoffswitch greensea">
                        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="show-unread" checked="">
                        <label class="onoffswitch-label" for="show-unread">
                          <span class="onoffswitch-inner"></span>
                          <span class="onoffswitch-switch"></span>
                        </label>
                      </div>
                    </div>
                  </div>
                </li>

              </ul>

            </div><!-- tab-pane -->

          </div><!-- tab-content -->
        </div>






      </div>
      <!-- Make page fluid-->




    </div>
    <!-- Wrap all page content end -->



    <section class="videocontent" id="video"></section>



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="assets/js/jquery.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="assets/js/vendor/bootstrap/bootstrap.min.js"></script>
<script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js?lang=css&skin=sons-of-obsidian"></script>
<script type="text/javascript" src="assets/js/vendor/mmenu/js/jquery.mmenu.min.js"></script>
<script type="text/javascript" src="assets/js/vendor/sparkline/jquery.sparkline.min.js"></script>
<script type="text/javascript" src="assets/js/vendor/nicescroll/jquery.nicescroll.min.js"></script>
<script type="text/javascript" src="assets/js/vendor/animate-numbers/jquery.animateNumbers.js"></script>
<script type="text/javascript" src="assets/js/vendor/videobackground/jquery.videobackground.js"></script>
<script type="text/javascript" src="assets/js/vendor/blockui/jquery.blockUI.js"></script>\

<script src="assets/js/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="assets/js/vendor/datatables/ColReorderWithResize.js"></script>
<script src="assets/js/vendor/datatables/colvis/dataTables.colVis.min.js"></script>
<script src="assets/js/vendor/datatables/tabletools/ZeroClipboard.js"></script>
<script src="assets/js/vendor/datatables/tabletools/dataTables.tableTools.min.js"></script>
<script src="assets/js/vendor/datatables/dataTables.bootstrap.js"></script>
<script src="assets/js/vendor/flot/jquery.flot.min.js"></script>
<script src="assets/js/vendor/flot/jquery.flot.time.min.js"></script>
<script src="assets/js/vendor/flot/jquery.flot.selection.min.js"></script>
<script src="assets/js/vendor/flot/jquery.flot.animator.min.js"></script>
<script src="assets/js/vendor/flot/jquery.flot.orderBars.js"></script>
<script src="assets/js/vendor/easypiechart/jquery.easypiechart.min.js"></script>
<script src="assets/js/vendor/rickshaw/raphael-min.js"></script> 
<script src="assets/js/vendor/rickshaw/d3.v2.js"></script>
<script src="assets/js/vendor/rickshaw/rickshaw.min.js"></script>

<script src="assets/js/vendor/morris/morris.min.js"></script>

<script src="assets/js/vendor/tabdrop/bootstrap-tabdrop.min.js"></script>

<script src="assets/js/vendor/summernote/summernote.min.js"></script>
<script src="assets/js/vendor/chosen/chosen.jquery.min.js"></script>

<script src="assets/js/minimal.min.js"></script>

<script>
  window.loading
$(function(){
  $('.pie-chart').easyPieChart();
  // Add custom class to pagination div
  $.fn.dataTableExt.oStdClasses.sPaging = 'dataTables_paginate paging_bootstrap paging_custom';

  /*************************************************/
  /**************** BASIC DATATABLE ****************/
  /*************************************************/

  /* Define two custom functions (asc and desc) for string sorting */
  jQuery.fn.dataTableExt.oSort['string-case-asc']  = function(x,y) {
      return ((x < y) ? -1 : ((x > y) ?  1 : 0));
  };

  jQuery.fn.dataTableExt.oSort['string-case-desc'] = function(x,y) {
      return ((x < y) ?  1 : ((x > y) ? -1 : 0));
  };

  /* Add a click handler to the rows - this could be used as a callback */
  $("#basicDataTable tbody tr").click( function( e ) {
    if ( $(this).hasClass('row_selected') ) {
      $(this).removeClass('row_selected');
    }
    else {
      oTable01.$('tr.row_selected').removeClass('row_selected');
      $(this).addClass('row_selected');
    }

    // FadeIn/Out delete rows button
    
  });

  /* Build the DataTable with third column using our custom sort functions */
  var oTable01 = $('#basicDataTable').dataTable({
    "sDom":
      ""+
      ""+
      "",
    "oLanguage": {
      "sSearch": ""
    },
    "aaSorting": [ [0,'asc']],
    "aoColumns": [
      null,
      { "sType": 'string-case' },
      null,
      null
    ],
    "fnInitComplete": function(oSettings, json) {
      $('.dataTables_filter').attr("placeholder", "Search");
    }
  });

  // Append delete button to table
  var deleteRowLink = '<a href="#" id="deleteRow" class="btn btn-red btn-xs delete-row">進入戰役</a>'
  $('#basicDataTable_wrapper').append(deleteRowLink);

  /* Add a click handler for the delete row */
  $('#deleteRow').click( function() {
    var anSelected = fnGetSelected(oTable01);
    if (anSelected.length !== 0 ) {
      oTable01.fnDeleteRow(anSelected[0]);
      $('#deleteRow').stop().fadeOut(300);
    }
  });

  /* Get the rows which are currently selected */
  function fnGetSelected(oTable01Local){
    return oTable01Local.$('tr.row_selected');
  };



  //initialize chosen
  $('.dataTables_length select').chosen({disable_search_threshold: 10});

})

</script>
</body>
</html>

