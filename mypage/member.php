<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ccccoding</title>
  <!-- 부트스트랩 css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- 폰트어썸 css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="../css/common.css">
  <link rel="stylesheet" href="../css/layout.css">
  <link rel="stylesheet" href="../css/content.css">
  <!-- 부트스트랩 js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  
  <!-- 제이쿼리 -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  
  <!-- 공통 js -->
  <script src="../js/common.js"></script>

</head>
<body>
  <!-- header 박소현 (s) -->
  <header>
    <div class="top-area">
      <div class="container">
        <ul class="list-group util-list">
          <!-- 로그인 전(s) -->
          <li class="list-group-item">
            <a href="#">회원가입</a>
          </li>
          <li class="list-group-item">
            <a href="#">로그인</a>
          </li>
          <li class="list-group-item">
            <a href="#">고객센터</a>
          </li>
          <!-- 로그인 전(e) -->
          <!-- 로그인 후(s) -->
          <li class="list-group-item user-menu">
            <div class="login-profile">
              <div class="img-wrap">
                <img src="../image/img_header_pf.png" alt="프로필 이미지">
              </div>
              <span class="id">시크릿쥬쥬</span>님
            </div>
            <ul class="list-group user-menu-list">
              <li class="list-group-item">
                <a href="#">내 강의 보기</a>
              </li>
              <li class="list-group-item">
                <a href="#">구매내역</a>
              </li>
              <li class="list-group-item">
                <a href="#">문의내역</a>
              </li>
              <li class="list-group-item">
                <a href="#">회원정보 수정</a>
              </li>
              <li class="list-group-item line">
                <a href="#">로그아웃</a>
              </li>
            </ul>
          </li>
          <li class="list-group-item">
            <a href="#">수강바구니</a>
          </li>
          <li class="list-group-item">
            <a href="#">고객센터</a>
          </li>
          <!-- 로그인 후(e) -->
        </ul>
      </div>
    </div>
    <div class="gnb-area">
      <div class="container">
        <div class="gnb">
          <div class="left">
            <h1 class="logo">
              <a href="../index.html">
                <span class="visually-hidden">ㅋㅋㅋ코딩</span>
              </a>
            </h1>
            <ul class="list-group gnb-list">
              <li class="list-group-item">
                <a href="#">카테고리</a>
                <div class="sub-wrap">
                  <ul class="list-group">
                    <li class="list-group-item">
                      <a href="#">웹개발</a>
                    </li>
                    <li class="list-group-item">
                      <a href="#">데이터 사이언스</a>
                    </li>
                    <li class="list-group-item">
                      <a href="#">컴퓨터 사이언스</a>
                    </li>
                    <li class="list-group-item">
                      <a href="#">프로그래임 언어</a>
                    </li>
                    <li class="list-group-item">
                      <a href="#">디자인</a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="list-group-item">
                <a href="#">수강후기</a>
              </li>
              <li class="list-group-item">
                <a href="#">이벤트</a>
              </li>
              <li class="list-group-item">
                <a href="#">커뮤니티</a>
                <div class="sub-wrap">
                  <ul class="list-group">
                    <li class="list-group-item">
                      <a href="#">공지사항</a>
                    </li>
                    <li class="list-group-item">
                      <a href="#">Q&amp;A</a>
                    </li>
                  </ul>
                </div>
              </li>
            </ul>
          </div>

          <form action="" class="filter-area">
            <div class="ipt-wrap">
              <input type="search" class="form-control" placeholder="찾고싶은 강의 주제를 입력해주세요.">
              <button class="ico-search">
                <span class="visually-hidden">검색</span>
                <i class="fa-solid fa-magnifying-glass"></i>
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </header>
  <!-- header 박소현 (e) -->

  <!-- 공통 부분 (s) -->
  <main class="sub mypage">
    <div class="container">
      <div class="my-gnb-wrap">
        <!-- 프로필 (s) -->
        <div class="pf-area">
          <div class="img-wrap">
            <img src="../image/img_my_profile.png" alt="">
          </div>
          <div class="content">
            <span>반갑습니다!</span>
            <span><em>시크릿쥬쥬</em> 님!</span>
          </div>
        </div>
        <!-- 프로필 (e) -->
        <!-- 가지고 있는 쿠폰/ 리스트(s) -->
        <ul class="list-group user-bf-list">
          <li class="list-group-item">
            <div class="item">쿠폰</div>
            <div class="val"><a href="benefit.html" class="num">0</a>개</div>
          </li>
          <li class="list-group-item">
            <div class="item">포인트</div>
            <div class="val"><a href="benefit.html" class="num">10</a>P</div>
          </li>
        </ul>
        <!-- 가지고 있는 쿠폰/ 리스트(e) -->
        <nav class="sub-menu">
          <ul class="list-group">
            <li class="list-group-item">
              <a href="mypage.html" class="accordion-button tit-h4">HOME</a>
            </li>
            <li class="list-group-item">
              <a href="course.html" class="accordion-button tit-h4">내강의 보기</a>
            </li>
            <li class="list-group-item">
              <a href="#" class="accordion-button tit-h4">수강바구니</a> <!--url나오면 넣기-->
            </li>
            <li class="list-group-item">
              <a href="payment.html" class="accordion-button tit-h4">구매내역</a>
            </li>
            <li class="list-group-item">
              <a href="inquiries.html" class="accordion-button tit-h4">문의내역</a>
            </li>
            <li class="list-group-item">
              <a href="benefit.html" class="accordion-button tit-h4">쿠폰&amp;포인트</a>
            </li>
            <li class="list-group-item">
              <a href="member.html" class="accordion-button tit-h4">회원정보 수정</a>
            </li>
          </ul>

          <div class="logout">
            <a href="#" class="tit-h4">로그아웃</a>
          </div>
        </nav>
      </div>
      
      <div class="con-wrap">
        <div class="page-tit-area">
          <h2 class="tit-h1">마이페이지</h2>
        </div>
        <!-- 공통 부분 (e) -->

        <!-- 아래에서 부터 작업영역입니다 -->
        <h3 class="tit-h4">이미지프로필</h3>
        <form action="" class="form-list">
          <!-- 프로필 (s) -->
          <div class="pf-area">
            <div class="img-wrap">
              <img src="../image/img_my_profile.png" alt="">
            </div>
            <div class="content">
              <button type="button" class="btn btn-primary gray">변경</button>
              <span class="txt-xs">확장자: png, jpg, jpeg / 용량: 1MB 이하</span>
            </div>
          </div>
          <!-- 프로필 (e) -->

          <!-- input text 1 (s) -->
          <div class="row">
            <label for="name" class="col-md-1 col-form-label tit-h4">이름</label>
            <div class="col-md-11">
              <div class="input-group">
                <div class="ipt-wrap">
                  <input type="text" class="form-control" id="name" name="name" placeholder="이름을 입력해주세요">
                </div>
              </div>
            </div>
          </div>
          <!-- input text 1 (e) -->

          <!-- input email + button (s) -->
          <div class="row mix">
            <label for="email" class="col-md-1 col-form-label tit-h4">이메일</label>
            <div class="col-md-11">
              <div class="input-group">
                <div class="ipt-wrap">
                  <input type="email" class="form-control" id="email" name="email" placeholder="이메일을 입력해주세요.">
                </div>
                <button type="button" class="btn btn-outline-secondary btn-sm">인증</button>
                <p class="txt-info">*이메일 변경 후 재인증 필요</p>
              </div>
            </div>
          </div>
          <!-- input email + button (e) -->

          <!-- input password (s) -->
          <div class="row pw">
            <label for="password" class="col-md-1 col-form-label tit-h4">비밀번호</label>
            <div class="col-md-11">
              <div class="input-group">
                <div class="ipt-wrap">
                  <input type="password" class="form-control" id="password" placeholder="현재 비밀번호">
                </div>
                <div class="ipt-wrap">
                  <input type="password" class="form-control" id="password" placeholder="새 비밀번호">
                </div>
                <div class="ipt-wrap">
                  <input type="password" class="form-control" id="password" placeholder="새 비밀번호 확인">
                </div>
              </div>
            </div>
          </div>
          <!-- input password (e) -->

          <!-- input tel + button (s) -->
          <div class="row mix">
            <label for="name" class="col-md-1 col-form-label tit-h4">휴대폰번호</label>
            <div class="col-md-11">
              <div class="input-group">
                <div class="ipt-wrap">
                  <input type="tel" class="form-control" id="name" placeholder="휴대폰번호를 입력해주세요.">
                </div>
                <button type="button" class="btn btn-outline-secondary btn-sm">인증</button>
                <p class="txt-info">*휴대폰번호 변경 후 재인증 필요</p>
              </div>
            </div>
          </div>
          <!-- input tel + button (e) -->

          <a href="# " class="links">회원탈퇴하기</a>

          <div class="btn-area">
            <button type="button" class="btn btn-primary btn-md">수정완료</button>
          </div>
        </form>
      </div>
    </div>
  </main>

  <!-- footer 박소현 (s) -->
  <footer>
    <div class="container">
      <ul class="list-group etc-list link">
        <li class="list-group-item">
          <a href="/" class="logo">
            <img src="../image/logo_foot.png" alt="ㅋㅋㅋ코딩"> <!--경로수정해야함-->
          </a>
        </li>
        <li class="list-group-item">
          <a href="">
            이용약관
          </a>
        </li>
        <li class="list-group-item">
          <a href="">
            개인정보처리방침
          </a>
        </li>
        <li class="list-group-item">
          <a href="">
            고객센터
          </a>
        </li>
      </ul>

      <ul class="list-group etc-list">
        <li class="list-group-item">
          <span class="visually-hidden">회사명</span>
          ㅋㅋㅋ
        </li>
        <li class="list-group-item">
          대표:박소현,우예지,유부현
        </li>
        <li class="list-group-item">
          개인정보보호책임자:김동주
        </li>
        <li class="list-group-item">
          이메일:<a href="mailto:juju@ccccoding.com">juju@ccccoding.com</a>
        </li>
      </ul>

      <ul class="list-group etc-list">
        <li class="list-group-item">
          사업자 번호:111-11-11111 
        </li>
        <li class="list-group-item">
          통신판매업 제 2024-서울종로- 1111 호
        </li>
        <li class="list-group-item">
          주소 서울특별시 종로구 수표로 96 쥬쥬빌딩
        </li>
        <li class="list-group-item">
          이메일:<a href="mailto:juju@ccccoding.com">juju@ccccoding.com</a>
        </li>
      </ul>

      <p class="copy">Copyright &copy; CCCCODING CORPORATION.,Ltd All Rights Reserved.</p>
    </div>
  </footer>
  <!-- footer 박소현 (e) -->
</body>
</html>