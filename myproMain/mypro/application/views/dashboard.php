<?php $this->load->view('pageheader');?> 
    <div class="rightpanel">
        
        <ul class="breadcrumbs">
            <li><a href="project"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
            <li>看板 Dashboard</li>
            <li class="right">
                    <a href="" data-toggle="dropdown" class="dropdown-toggle"><i class="icon-tint"></i> Color Skins</a>
                    <ul class="dropdown-menu pull-right skin-color">
                        <li><a href="default">Default</a></li>
                        <li><a href="navyblue">Navy Blue</a></li>
                        <li><a href="palegreen">Pale Green</a></li>
                        <li><a href="red">Red</a></li>
                        <li><a href="green">Green</a></li>
                        <li><a href="brown">Brown</a></li>
                    </ul>
            </li>
        </ul>
        
        <div class="pageheader">
            <form action="results.html" method="post" class="searchbar">
                <!-- <input type="text" name="keyword" placeholder="To search type and hit enter..." />   -->
            </form>
            <div class="pageicon"><span class="iconfa-laptop"></span></div>
            <div class="pagetitle">
                <h5>功能总览 All Features Summary</h5>
                <h1>看板 Dashboard</h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
            <div class="maincontentinner">
                <div class="row-fluid">
                    <div id="dashboard-left" class="span8">
                        
                        <!-- 
                        <h5 class="subtitle">Recently Viewed Pages</h5>
                        <ul class="shortcuts">
                            <li class="events">
                                <a href="">
                                    <span class="shortcuts-icon iconsi-event"></span>
                                    <span class="shortcuts-label">Events</span>
                                </a>
                            </li>
                            <li class="products">
                                <a href="">
                                    <span class="shortcuts-icon iconsi-cart"></span>
                                    <span class="shortcuts-label">Products</span>
                                </a>
                            </li>
                            <li class="archive">
                                <a href="">
                                    <span class="shortcuts-icon iconsi-archive"></span>
                                    <span class="shortcuts-label">Archives</span>
                                </a>
                            </li>
                            <li class="help">
                                <a href="">
                                    <span class="shortcuts-icon iconsi-help"></span>
                                    <span class="shortcuts-label">Help</span>
                                </a>
                            </li>
                            <li class="last images">
                                <a href="">
                                    <span class="shortcuts-icon iconsi-images"></span>
                                    <span class="shortcuts-label">Images</span>
                                </a>
                            </li>
                        </ul>
                        <div class="divider30"></div>
                         -->
                       

                        <h4 class="widgettitle">作为甲方 Boss</h4>
                        <table class="table table-bordered responsive">
                            <thead>
                                <tr>
                                    <th class="head1">条目</th>
                                    <th class="head0">数量</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>我的项目数量</td>
                                    <td><?php echo $projectCount;?></td>
                                </tr>
                                <tr>
                                    <td>我的原始需求总数量</td>
                                    <td><?php echo $reqorgcount;?></td>
                                </tr>
                                <tr>
                                    <td>我的未开始的需求</td>
                                    <td><?php echo $nostartreq;?></td>
                                </tr>
                                <tr>
                                    <td>我的进行中的需求</td>
                                    <td><?php echo $inprogressreq;?></td>
                                </tr>                                
                            </tbody>
                        </table>
                        <br/>
						<h4 class="widgettitle">作为乙方 Partner</h4>
                        <table class="table table-bordered responsive">
                            <thead>
                                <tr>
                                    <th class="head1">条目</th>
                                    <th class="head0">数量</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>分配给我的需求分析总数量</td>
                                    <td><?php echo $assigntoMeAllReqorg;?></td>
                                </tr>
                                <tr>
                                    <td>我未开始的需求分析</td>
                                    <td>7</td>
                                </tr>                                
                                <tr>
                                    <td>我未开始的设计</td>
                                    <td>7</td>
                                </tr>
                                <tr>
                                    <td>我未开始的开发</td>
                                    <td>7</td>
                                </tr>
                                <tr>
                                    <td>我未开始的测试</td>
                                    <td>7</td>
                                </tr>
                                
                                <tr>
                                    <td>我进行中的需求分析</td>
                                    <td>7</td>
                                </tr>
                                
                                <tr>
                                    <td>我进行中的设计</td>
                                    <td>7</td>
                                </tr>
                                <tr>
                                    <td>我进行中的开发</td>
                                    <td>7</td>
                                </tr>
                                <tr>
                                    <td>我进行中的测试</td>
                                    <td>7</td>
                                </tr>
                            </tbody>
                        </table>
                        
                        
                        
                        <br />
<!--                         
                        <h4 class="widgettitle"><span class="icon-comment icon-white"></span>最近评论 Recent Comments</h4>
                        <div class="widgetcontent nopadding">
                            <ul class="commentlist">
                                <li>
                                    <img src="<?php base_url();?>resource/images/photos/thumb2.png" alt="" class="pull-left" />
                                    <div class="comment-info">
                                        <h4><a href="">Sed ut perspiciatis unde omnis iste natus error sit voluptatem</a></h4>
                                        <h5>in <a href="">Sit Voluptatem</a></h5>
                                        <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. </p>
                                        <p>
                                            <a href="" class="btn btn-success btn-small"><span class="icon-thumbs-up icon-white"></span>赞一下 Approve</a>
                                            <a href="" class="btn btn-small"><span class="icon-thumbs-down"></span>踩一下 Reject</a>
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <img src="<?php base_url();?>resource/images/photos/thumb1.png" alt="" class="pull-left" />
                                    <div class="comment-info">
                                        <h4><a href="">But I must explain to you how all this mistaken</a></h4>
                                        <h5>in <a href="">At vero eos et accusamus et iusto odio dignissimos</a></h5>
                                        <p>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.</p>
                                        <p>
                                            <a href="" class="btn btn-success btn-small"><span class="icon-thumbs-up icon-white"></span>赞一下 Approve</a>
                                            <a href="" class="btn btn-small"><span class="icon-thumbs-down"></span>踩一下 Reject</a>
                                        </p>
                                    </div>
                                </li>
                                <li><a href="">查看更多评论 View More Comments</a></li>
                            </ul>
                        </div>
 -->            
                        <br />
                        
                        
                    </div><!--span8-->
                    
                    <div id="dashboard-right" class="span4">
                        
                        <h5 class="subtitle">站内通告</h5>
                        
                        <div class="divider15"></div>
                        
                        <div class="alert alert-block">
                              <button data-dismiss="alert" class="close" type="button">&times;</button>
                              <h4>注意！</h4>
                              <p style="margin: 8px 0"><li>所有甲方需求不付费的，乙方看不到.</li></p>
                              <p style="margin: 8px 0"><li>所有甲方确认了乙方工作产出物后，于当周周六23：59分前将自动统一打入乙方“我的钱包”.</li></p>
                              <p style="margin: 8px 0"><li>乙方“我的钱包”的余额，在每周周一打入各自指定的银行帐户、支付宝中.</li></p>
                        </div><!--alert-->
                        
                        <div class="alert alert-block">
                              <button data-dismiss="alert" class="close" type="button">&times;</button>
                              <h4>注意！</h4>
                              <p style="margin: 8px 0"><li>所有甲方需求上线并付款时，本站将即时按10%抽取拥金，如当作为甲方时“我的钱包”中现余额为0元，现打入110元，实际显示余额为100元（即可用余额）。</li></p>
                        </div><!--alert-->
                        <br />
                        
                        
                        <h4 class="widgettitle">日历 Event Calendar</h4>
                        <div class="widgetcontent nopadding">
                            <div id="datepicker"></div>
                        </div>
                        
                        
                        
                        <br />
                                                
                    </div><!--span4-->
                </div><!--row-fluid-->

<?php $this->load->view('pagebottom');?> 
