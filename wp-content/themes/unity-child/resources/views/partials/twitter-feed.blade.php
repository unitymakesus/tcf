<div class="container">
  <div class="tweets">
    <h2 class="tweets__heading h4 text-uppercase"><span class="screen-reader-text">Tweets</span> From <a href="#">@TriComFdn</a> <svg viewBox="0 0 100 100" width="32" height="32" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g><path fill="#1DA1F2" d="M90,24.8c-2.9,1.3-6.1,2.2-9.4,2.6c3.3-2,6-5.3,7.2-9.1c-3.2,1.9-6.7,3.2-10.4,4c-3-3.2-7.2-5.2-12-5.2c-9.1,0-16.4,7.4-16.4,16.6c0,1.3,0.1,2.6,0.4,3.8C35.8,36.6,23.7,30,15.6,20c-1.4,2.4-2.2,5.2-2.2,8.3c0,5.8,2.9,10.8,7.3,13.8C18,42,15.4,41.3,13.2,40c0,0.1,0,0.1,0,0.2c0,8,5.7,14.7,13.1,16.2C25,56.8,23.6,57,22,57c-1.1,0-2.1-0.1-3.1-0.3C21,63.2,27,68,34.2,68.1c-5.7,4.4-12.7,7.1-20.3,7.1c-1.3,0-2.7-0.1-3.9-0.2c7.2,4.7,15.9,7.4,25.1,7.4c30.2,0,46.7-25.1,46.7-47c0-0.7,0-1.4,0-2.1C85,31,87.8,28,90,24.8z"></path></g></svg>
    </h2>
    <div class="tweets__wrap">
      {!! App\displayTweets('TriComFdn', 3) !!}
    </div>
  </div>
</div>
