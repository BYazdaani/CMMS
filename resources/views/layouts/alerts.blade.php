@if(auth()->user()->hasRole('Admin') || auth()->user()->hasRole('Super Admin'))


    <div class="hd-message-info">
        <a href="#">
            <div class="hd-message-sn">
                <div class="hd-message-img">
                    <img src="{{asset('../theme/img/post/1.jpg')}}" alt=""/>
                </div>
                <div class="hd-mg-ctn">
                    <h3>David Belle</h3>
                    <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                </div>
            </div>
        </a>
        <a href="#">
            <div class="hd-message-sn">
                <div class="hd-message-img">
                    <img src="{{asset('../theme/img/post/1.jpg')}}" alt=""/>
                </div>
                <div class="hd-mg-ctn">
                    <h3>Jonathan Morris</h3>
                    <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                </div>
            </div>
        </a>
        <a href="#">
            <div class="hd-message-sn">
                <div class="hd-message-img">
                    <img src="{{asset('../theme/img/post/1.jpg')}}" alt=""/>
                </div>
                <div class="hd-mg-ctn">
                    <h3>Fredric Mitchell</h3>
                    <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                </div>
            </div>
        </a>
        <a href="#">
            <div class="hd-message-sn">
                <div class="hd-message-img">
                    <img src="{{asset('../theme/img/post/1.jpg')}}" alt=""/>
                </div>
                <div class="hd-mg-ctn">
                    <h3>David Belle</h3>
                    <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                </div>
            </div>
        </a>
        <a href="#">
            <div class="hd-message-sn">
                <div class="hd-message-img">
                    <img src="{{asset('../theme/img/post/1.jpg')}}" alt=""/>
                </div>
                <div class="hd-mg-ctn">
                    <h3>Glenn Jecobs</h3>
                    <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                </div>
            </div>
        </a>
    </div>
    <div class="hd-mg-va">
        <a href="#">View Demandes</a>
    </div>

@elseif(auth()->user()->hasRole('Maintenance Technician'))


    <div class="hd-message-info">
        <a href="#">
            <div class="hd-message-sn">
                <div class="hd-message-img">
                    <img src="{{asset('../theme/img/post/1.jpg')}}" alt=""/>
                </div>
                <div class="hd-mg-ctn">
                    <h3>David Belle</h3>
                    <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                </div>
            </div>
        </a>
        <a href="#">
            <div class="hd-message-sn">
                <div class="hd-message-img">
                    <img src="{{asset('../theme/img/post/1.jpg')}}" alt=""/>
                </div>
                <div class="hd-mg-ctn">
                    <h3>Jonathan Morris</h3>
                    <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                </div>
            </div>
        </a>
        <a href="#">
            <div class="hd-message-sn">
                <div class="hd-message-img">
                    <img src="{{asset('../theme/img/post/1.jpg')}}" alt=""/>
                </div>
                <div class="hd-mg-ctn">
                    <h3>Fredric Mitchell</h3>
                    <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                </div>
            </div>
        </a>
        <a href="#">
            <div class="hd-message-sn">
                <div class="hd-message-img">
                    <img src="{{asset('../theme/img/post/1.jpg')}}" alt=""/>
                </div>
                <div class="hd-mg-ctn">
                    <h3>David Belle</h3>
                    <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                </div>
            </div>
        </a>
        <a href="#">
            <div class="hd-message-sn">
                <div class="hd-message-img">
                    <img src="{{asset('../theme/img/post/1.jpg')}}" alt=""/>
                </div>
                <div class="hd-mg-ctn">
                    <h3>Glenn Jecobs</h3>
                    <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                </div>
            </div>
        </a>
    </div>
    <div class="hd-mg-va">
        <a href="#">View Orders</a>
    </div>

@endif

