<style>
.loader{
    width: 100px;
    height: 100px;
    margin: 40px auto 0;
    list-style: none;
    position: relative;
}
.loader li{
    width: 100px;
    height: 1px;
    transform: translateX(-50%) translateY(-50%);
    position: absolute;
    top: 50%;
    left: 50%;
}
.loader li:nth-child(1){ transform: translateX(-50%) translateY(-50%) rotate(0deg); }
.loader li:nth-child(2){ transform: translateX(-50%) translateY(-50%) rotate(50deg); }
.loader li:nth-child(3){ transform: translateX(-50%) translateY(-50%) rotate(-50deg); }
.loader li:before,
.loader li:after{
    content: '';
    background: #2521ca;
    width: 7px;
    height: 7px;
    position: absolute;
    top: -3.5px;
    left: calc(50% - 7px);
    animation: animateBefore 1s infinite linear;
}
.loader li:after{
    left: 50%;
    animation: animateAfter 1s infinite linear;
}
@keyframes animateBefore{
    0%{
        box-shadow: 0 0 0 0 #2144ca, 0 0 0 0 #216eca, 0 0 0 0 #2199ca;
        opacity: 1;
        transform: translateX(0);
    }
    50%{
        opacity: 1;
        box-shadow: -10px 0 0 0 #2144ca, -20px 0 0 0 #216eca, -30px 0 0 0 #2199ca;
        transform: translateX(-15px);
    }
    100%{
        box-shadow: -15px 0 0 0 #2144ca, -30px 0 0 0 #216eca, -45px 0 0 0 #2199ca;
        opacity: 0;
        transform: translateX(-45px);
    }
}
@keyframes animateAfter{
    0%{
        box-shadow: 0 0 0 0 #2144ca, 0 0 0 0 #216eca, 0 0 0 0 #2199ca;
        opacity: 1;
        transform: translateX(0);
    }
    50%{
        box-shadow: 10px 0 0 0 #2144ca, 20px 0 0 0 #216eca, 30px 0 0 0 #2199ca;
        opacity: 1;
        transform: translateX(15px);
    }
    100%{
        box-shadow: 15px 0 0 0 #2144ca, 30px 0 0 0 #216eca, 45px 0 0 0 #2199ca;
        opacity: 0;
        transform: translateX(45px);
    }
}
</style>

<ul class="loader">
    <li></li>
    <li></li>
    <li></li>
</ul>