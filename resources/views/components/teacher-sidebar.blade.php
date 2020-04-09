<div class="sidebar sidebar-main">
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user">
            <div class="category-content">
                <div class="media">
                    <a href="#" class="media-left"><img src="/admin/images/placeholder.jpg"
                                                        class="img-circle img-sm" alt=""></a>
                    <div class="media-body">
                        <span class="media-heading text-semibold">Teacher</span>
                        <div class="text-size-mini text-muted">
                            <i class="icon-pin text-size-small"></i> &nbsp;Isfahan , IR
                        </div>
                    </div>

                    <div class="media-right media-middle">
                        <ul class="icons-list">
                            <li>
                                <a href="#"><i class="icon-cog3"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /user menu -->


        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">

                    <!-- Main -->
                    <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i>
                    </li>
                    <li class="active"><a href="{{route('teacher.dashboard')}}"><i class="icon-home4"></i>
                            <span>Dashboard</span></a></li>
                    <li>
                        <a href="#"><i class="icon-stack"></i> <span>کلاس های من</span></a>
                        <ul>
                            <li><a href="{{route('class.index')}}" id="">کلاس های موجود</a></li>
                            <li><a href="{{route('class.create')}}" id="">ایجاد کلاس جدید</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-pencil3"></i> <span>مدیریت آزمون ها</span></a>
                        <ul>
                            <li><a href="" id="layout3">تاریخچه آزمون ها</a></li>
                            <li><a href="" id="layout1">ایجادآزمون</a></li>
                            <li><a href="" id="layout2">ویرایش آزمون</a></li>
                            <li><a href="" id="layout3">ایجاد سوال</a></li>
                            <li><a href="" id="layout3">ویرایش سوال</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-people"></i> <span>پیام ها</span></a>
                        <ul>
                            <li><a href="">ارسال پیام</a></li>
                            <li><a href="">صندوق ورودی</a></li>

                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-upload"></i> <span>اطلاعیه</span></a>

                    </li>

                    <!-- /main -->

                    <!-- Page kits -->

                </ul>
            </div>
        </div>
        <!-- /main navigation -->

    </div>
</div>
