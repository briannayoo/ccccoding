<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>공지사항등록 - ccccoding</title>
  <!-- 부트스트랩 css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- 폰트어썸 css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="css/common.css">
  <link rel="stylesheet" href="css/layout.css">
  <!-- 부트스트랩 js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
      <!-- 상단 until-list (s) -->
      <ul class="list-unstyled top-util-list">
        <li class="alarm">
          <button type="button" class="btn">
            <i class="fa-solid fa-bell fa-small" aria-hidden="true">
            </i>
            <span class="tit-h3">알림</span>
            <span class="badge rounded-pill">
              <span class="visually-hidden">읽지않은 메시지</span>
              <em class="txt-s">9</em>
              <span class="visually-hidden">건</span>
            </span>
          </button>
        </li>
        <li class="profile">
          <div class="profile-wrap">
            <img src="image/img_pf_admin.jpg" alt="프로필이미지"> <!--실제로는 경로변경해야함 ../이거빼야됨-->
          </div>
          <span class="admin tit-h3">관리자</span>
        </li>
      </ul>
      <!-- 상단 until-list (e) -->
      <!-- sub-page-tit-area (s) -->
      <div class="page-tit-area">
        <h2 class="tit-h2">공지사항</h2>
      </div>
      <!-- sub-page-tit-area (e) -->
        <div class="content"> <!--temp-area 빼야됨-->
          <form action="#" class="form-list">
              <!-- 제목 -->
              <div class=" justify-content-between">
                <div class="row">
                  <label for="txt03" class="col-md-1 col-form-label tit-h4">제목</label>
                  <div class="col-md-11">
                    <div class="input-group">
                      <div class="col-md-11 ipt-wrap">
                        <input type="text" class="form-control" id="fm-txt03" placeholder="제목을 입력해주세요">
                      </div>
                      <!-- 고정체크박스 -->
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                          고정
                        </label>
                      </div>
                    </div>
                    </div>
                  </div>
                </div>
                 <!-- 텍스트 에어리어 -->
            <div class="row">
              <label for="txtarea" class="col-md-1 col-form-label tit-h4">내용</label>
              <div class="col-md-11">
                <div class="input-group">
                  <div class="col-md-12 ipt-wrap">
                    <textarea class="form-control" id="txtarea" placeholder="내용을 입력하세요."></textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <label for="file" class="col-md-1 col-form-label tit-h4">타이틀</label>
              <div class="col-md-11">
                <div class="input-group">
                  <div class="col-md-12 ipt-wrap">
                    <input class="form-control" type="file" id="file">
                  </div>
                </div>
              </div>
            </div>
            <!-- 버튼 -->
            <div class="btn-area">
              <button type="button" class="btn btn-primary btn-lg">버튼</button>
              <button type="button" class="btn btn-secondary btn-lg">버튼</button>
            </div>
          </form>
        </div>
  </div>
</body>