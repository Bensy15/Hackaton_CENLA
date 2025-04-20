@extends('layouts.app')
@section('content')

<p class="uptext">
    Платформа добрых дел
</p>

<link href="{{ asset('styles/style.css') }}" rel="stylesheet">
<div class="infoblock">
<div class="buttons">
    <div class="buttons">
        <a  href="{{ route('user.register') }}" class="infbtn">Нужна помощь</a>
        <a  href="{{ route('volunteer.register') }}" class="infbtn">Хочу помочь</a>   
    </div>
</div>
<div class="blocks">
    <div class="block">
        <div class="upblock">
            <img src="assets/like.png" alt="">
            <h1>Благотворительные организации</h1>
        </div>
        <p>Мы сотрудничаем с проверенными благотворительными фондами и НКО, 
            чтобы ваша помощь попала именно туда, где она нужнее всего. 
            Каждая организация проходит тщательную проверку перед тем, 
            как появиться на нашей платформе.</p>
    </div>
    <div class="block">
        <div class="upblock">
            <img src="assets/users.png" alt="">
            <h1>Пользователь</h1>
        </div>
        <p>
            Зарегистрируйтесь и создайте запрос на помощь - мы гарантируем конфиденциальность 
            и быстрое рассмотрение вашей заявки. Опишите ситуацию, и волонтеры 
            откликнутся в кратчайшие сроки.
        </p>
    </div>
    <div class="block">
        <div class="upblock">
            <img src="assets/check.png" alt="">
            <h1>Оценки</h1>
        </div>
        <p>
            После оказания помощи вы можете оценить работу волонтера по 5-балльной шкале 
            и оставить отзыв. Это помогает поддерживать качество услуг 
            и создает доверительную атмосферу.
        </p>
    </div>
</div>

</div>
<div class="volblock">
<img src="assets/vol2.jpg">
<div class="voltext">
    <h1>Ваши проблемы - наша забота!</h1>
    <p>
        Наша платформа объединяет тех, кто нуждается в помощи, и тех, кто готов её оказать. 
        Будь то бытовая помощь пожилым людям, поддержка бездомных животных 
        или сбор средств на лечение - вместе мы можем больше. 
        Присоединяйтесь к сообществу добрых дел!
    </p>
    </div>
</div>

<!-- <a href="#up">
<img class="anchor" src="assets/up-arrow.png">
</a> -->
<div class="feedback">
<a href="info@сенла.рф"><img src="assets/email.png"></a>
<a href="t.me/careerSEN"><img src="assets/telegram.png"></a>
<a href="vk.com/careersen"><img src="assets/vk.png"></a>
<a href="rutube.ru/video/c6cc4d620b1d4338901770a44b3e82f4/"><img src="assets/rutube.png"></a>
<a href="+74993489870"><img src="assets/phone-call.png"></a>
</div>
@endsection