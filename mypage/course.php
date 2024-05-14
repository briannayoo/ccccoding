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
            <a href="#">장바구니</a>
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
          <h2 class="tit-h1">내 강의 보기</h2>
        </div>

        <form action="" class="filter-area">
          <div class="difficulty">
            <strong class="tit-h5">난이도</strong>
            <div class="list-group list-group-horizontal">
              <div class="list-group-item">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="difficulty_01" name="difficulty_01">
                  <label class="form-check-label" for="difficulty_01">
                    상
                  </label>
                </div>
              </div>
              <div class="list-group-item">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="difficulty_02" name="difficulty_02">
                  <label class="form-check-label" for="difficulty_02">
                    중
                  </label>
                </div>
              </div>
              <div class="list-group-item">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="difficulty_03" name="difficulty_03">
                  <label class="form-check-label" for="difficulty_03">
                    하
                  </label>
                </div>
              </div>
            </div>
          </div>
          <div class="ipt-wrap">
            <input type="search" class="form-control" placeholder="검색어를 입력하세요.">
            <button class="ico-search">
              <span class="visually-hidden">검색</span>
              <i class="fa-solid fa-magnifying-glass"></i>
            </button>
          </div>
        </form>

        <div class="sort-area">
          <select class="form-select" aria-label="정렬 순서 선택">
            <option value="1" selected>최신순</option>
            <option value="2">인기순</option>
            <option value="3">추천순</option>
          </select>
        </div>
        <!-- 공통 부분 (e) -->

        <!-- 아래에서 부터 작업영역입니다 -->
        <div class="lecture-area">
          <ul>
            <li>
              <a href="#">
                <img src="../image/img_lecture.png" alt="">
                <h3 class="tit-h4">따라하며 배우는 리액트 A-Z</h3>
                <!-- progress bar (s) -->
                <div class="progress">
                  <div class="graph" style="width:0%;">
                    <span class="count"><em>0</em>%</span>
                    <span class="txt">얼마 안남았어요! 힘을 내요!</span>
                  </div>
                </div>
                <!-- progress bar (e) -->
              </a>
            </li>
            <li>
              <a href="#">
                <img src="../image/img_lecture.png" alt="">
                <h3 class="tit-h4">따라하며 배우는 리액트 A-Z</h3>
                <!-- progress bar (s) -->
                <div class="progress">
                  <div class="graph" style="width:0%;">
                    <span class="count"><em>0</em>%</span>
                    <span class="txt">얼마 안남았어요! 힘을 내요!</span>
                  </div>
                </div>
                <!-- progress bar (e) -->
              </a>
            </li>
            <li>
              <a href="#">
                <img src="../image/img_lecture.png" alt="">
                <h3 class="tit-h4">따라하며 배우는 리액트 A-Z</h3>
                <!-- progress bar (s) -->
                <div class="progress">
                  <div class="graph" style="width:0%;">
                    <span class="count"><em>0</em>%</span>
                    <span class="txt">얼마 안남았어요! 힘을 내요!</span>
                  </div>
                </div>
                <!-- progress bar (e) -->
              </a>
            </li>
            <li>
              <a href="#">
                <img src="../image/img_lecture.png" alt="">
                <h3 class="tit-h4">따라하며 배우는 리액트 A-Z</h3>
                <!-- progress bar (s) -->
                <div class="progress">
                  <div class="graph" style="width:0%;">
                    <span class="count"><em>0</em>%</span>
                    <span class="txt">얼마 안남았어요! 힘을 내요!</span>
                  </div>
                </div>
                <!-- progress bar (e) -->
              </a>
            </li>
            <li>
              <a href="#">
                <img src="../image/img_lecture.png" alt="">
                <h3 class="tit-h4">따라하며 배우는 리액트 A-Z</h3>
                <!-- progress bar (s) -->
                <div class="progress">
                  <div class="graph" style="width:0%;">
                    <span class="count"><em>0</em>%</span>
                    <span class="txt">얼마 안남았어요! 힘을 내요!</span>
                  </div>
                </div>
                <!-- progress bar (e) -->
              </a>
            </li>
            <li>
              <a href="#">
                <img src="../image/img_lecture.png" alt="">
                <h3 class="tit-h4">따라하며 배우는 리액트 A-Z</h3>
                <!-- progress bar (s) -->
                <div class="progress">
                  <div class="graph" style="width:0%;">
                    <span class="count"><em>0</em>%</span>
                    <span class="txt">얼마 안남았어요! 힘을 내요!</span>
                  </div>
                </div>
                <!-- progress bar (e) -->
              </a>
            </li>
          </ul>
        </div>

        <!-- nodata(s) -->
        <div class="nodata">
          <p class="txt">진행중인 강의가 없습니다.</p>
        </div>
        <!-- nodata(e) -->

        <!-- pagination(s) -->
        <nav aria-label="페이지네이션">
          <ul class="pagination">
            <li class="page-item disabled">
              <a class="page-link" href="#" tabindex="-1">
                <span class="visually-hidden">처음</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-left" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                  <path fill-rule="evenodd" d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                </svg>
              </a>
            </li>
            <li class="page-item disabled">
              <a class="page-link" href="#" tabindex="-1">
                <span class="visually-hidden">이전</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                </svg>
              </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item active"> <!--active일떄 블라인드 현재페이지 스크립트로 넣어야함-->
              <a class="page-link" href="#">2</span></a>
            </li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
              <a class="page-link" href="#">
                <span class="visually-hidden">다음</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"/>
                </svg>
              </a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">
                <span class="visually-hidden">마지막</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-right" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708"/>
                  <path fill-rule="evenodd" d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708"/>
                </svg>
              </a>
            </li>
          </ul>
        </nav>
        <!-- pagination(e) -->
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