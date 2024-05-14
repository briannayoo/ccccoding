<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>회원가입 - ccccoding</title>
  <!-- 부트스트랩 css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- 폰트어썸 css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="/ccccoding/css/common.css">
  <link rel="stylesheet" href="/ccccoding/css/layout.css">
  <link rel="stylesheet" href="/ccccoding/css/content.css">
  <!-- 부트스트랩 js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  
  <!-- 제이쿼리 -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>
<body>
  <div id="sign-wrap">
    <div class="sign-bg">

      <form action="signup_ok.php" method="POST" class="form-list row justify-content-center" id="signup">
        <h1 class="text-center bnr-tit-l mb-6"><img src="/ccccoding/image/logo_big.png" alt="로고"></h1>
        <!-- <div class="slidewrapper">
          <ul class="slidecontainer animated">
            <li class="slide">나의 커리어 메이트 ㅋㅋㅋ 코딩</li>
            <li class="slide">한달만에 취업하는 특급 코딩</li>
            <li class="slide">ㅋㅋㅋ 코딩과 함께라면 무엇이든 해냅니다</li>
            <li class="slide"></li>
          </ul>
        </div> -->
        <div class="form-floating mb-3">
          <input type="text" class="form-control" name="username" id="username" placeholder="닉네임" required>
          <label for="username" class="label-ml">닉네임</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" name="userid" id="userid" placeholder="아이디" required>
          <label for="userid" class="label-ml">아이디</label>
        </div>
        <div class="form-floating">
          <input type="email" class="form-control" name="email" id="email" placeholder="이메일" required>
          <label for="email" class="label-ml">이메일</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" name="passwd" id="passwd" placeholder="비밀번호" required>
          <label for="passwd" class="label-ml">비밀번호</label>
        </div>
        <p class="txt-sm">해당 개정은 “ㅋㅋㅋ 코딩”에서 제공하는 서비스를 모두 이용하실 수 있습니다. 가입 시 서비스 이용약관(ㅋㅋㅋ코딩), <strong>개인정보 처리 방침에 동의</strong>하는 것으로 간주합니다.</p>
        <div class="list-group list-group-horizontal">
          <div class="list-group-item">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="chk-list-04">
              <label class="form-check-label" for="chk-list-04">
                동의하기
              </label>
            </div>
          </div>
        </div>
        <div class="mt-3">
          <button class="btn btn-primary log-btn">가입하기</button>
        </div>
      </form>
    </div>
  </div>
  <script>
    document.addEventListener('DOMContentLoaded',()=>{
        $('.log-btn').on('click',function(){         
            let userid = $('#userid').val();
            let email = $('#email').val();

            let data = {
                userid:userid,
                email:email
            }
            console.log(data);
            $.ajax({
                async:false,
                url:'signup_check.php',
                data:data,
                type:'POST',
                dataType:'json',
                success:function(returned_data){
                    if(Number(returned_data.cnt) > 0){
                        alert('아이디 또는 이메일이 중복됩니다, 다시 시도해주세요.');
                        $('#userid').focus();
                        return false;
                    }else{
                        $('#signup').submit();
                    }
                }
            });
        });

    });//DOMContentLoaded
</script>
</body>
</html>