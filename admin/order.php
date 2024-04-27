<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/header.php';
?>
      <!-- sub-page-tit-area (s) -->
      <div class="page-tit-area">
        <h2 class="tit-h2">수강관리</h2>
      </div>
      <!-- sub-page-tit-area (e) -->

      <div class="content">
        <form action="#" class="form-list">
          <!-- select + datepicker (s) -->
          <div class="row">
            <label for="src-date" class="col-md-1 col-form-label tit-h4 visually-hidden">수강관리 날짜로 정보검색</label> <!-- label hidden으로 사용  -->
            <div class="col-md-12">
              <div class="input-group justify-content-between align-items-center">
                <div class="col-md-4 ipt-wrap">
                  <select class="form-select form-select-sm" id="src-date" name="src-date" aria-label="select">
                    <option  value="1" selected>결제일</option>
                    <option  value="2">사용기한</option>
                  </select>
                </div>
                <div class="date-wrap col-md-8">
                  <div class="col-md-6 ipt-wrap">
                    <input type="text" class="ipt-datepicker" id="datepicker-01" name="datepicker-01" placeholder="YYYY-MM-DD">
                    <button type="button" class="open"><span class="visually-hidden">달력 레이어 열기</span></button>
                  </div>
                  <div class="col-md-6 ipt-wrap">
                    <input type="text" class="ipt-datepicker" id="datepicker-02" name="datepicker-02" placeholder="YYYY-MM-DD">
                    <button type="button" class="open"><span class="visually-hidden">달력 레이어 열기</span></button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- elect + datepicker 1/3 (e) -->
          <!-- select + text + button (s) -->
          <div class="row">
            <label for="info-select" class="col-md-1 col-form-label tit-h4 visually-hidden">수강관리 회원정보로 검색</label> <!-- label hidden으로 사용  -->
            <div class="col-md-12">
              <div class="input-group justify-content-between align-items-center">
                <div class="col-md-4 ipt-wrap">
                  <select class="form-select form-select-sm" id="info-select" name="info-select" aria-label="select">
                    <option value="1" selected>이름</option>
                    <option value="2">아이디</option>
                    <option value="3">강좌명</option>
                  </select>
                </div>
                <div class="col-md-7 ipt-wrap">
                  <input type="text" class="form-control" id="search" name="search" placeholder="검색어를 입력하세요">
                </div>
                <button type="button" class="btn btn-primary btn-sm">검색</button>
              </div>
            </div>
          </div>
          <!-- elect + text + button 1/3 (e) -->
        </form>

        <div class="total">
          <span>총 <em>8</em>건</span>
        </div>

        <!-- table(s) -->
        <table class="table table-bordered text-center">
          <!-- 각자 크기에 맞게 위드값 조정 합쳐서 100% -->
          <colgroup>
            <colgroup>
              <col style="width:auto" span="3">
              <col style="width:35%">
              <col style="width:auto" span="5">
            </colgroup>
          </colgroup>
          <thead>
            <tr>
              <th scope="col">
                <div>
                  <span class="visually-hidden">전체선택</span>
                  <input class="form-check-input" type="checkbox" id="all-check" value="" aria-label="checkbox"> 
                </div>
              </th>
              <th scope="col">결제일</th>
              <th scope="col">이름</th>
              <th scope="col">아이디</th>
              <th scope="col">강의명</th>
              <th scope="col">금액</th>
              <th scope="col">쿠폰사용</th>
              <th scope="col">사용기한</th>
              <th scope="col">취소신청</th>
              <th scope="col">환불신청</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <div>
                  <input class="form-check-input" type="checkbox" id="check-01" value="" aria-label="checkbox">
                </div>
              </td>
              <td>YYYY-MM-DD</td>
              <td>박공주</td>
              <td>pgongju01</td>
              <td>쥬쥬쌤의 쉽게배우는 자바스크립트 강의명 길어지면...처리</td>
              <td class="text-end">1,000,000원</td>
              <td>2,000,000원 쿠폰</td>
              <td>YYYY-MM-DD~YYYY-MM-DD</td>
              <td>신청</td>
              <td></td>
            </tr>
            <tr>
              <td>
                <div>
                  <input class="form-check-input" type="checkbox" id="check-02" value="" aria-label="checkbox">
                </div>
              </td>
              <td>YYYY-MM-DD</td>
              <td>우공주</td>
              <td>wgongju01</td>
              <td>쥬쥬쌤의 css</td>
              <td class="text-end">1,000,000,000원</td>
              <td>20% 쿠폰</td>
              <td>무제한</td>
              <td></td>
              <td>신청</td>
            </tr>
            <tr>
              <td>
                <div>
                  <input class="form-check-input" type="checkbox" id="check-03" value="" aria-label="checkbox">
                </div>
              </td>
              <td>YYYY-MM-DD</td>
              <td>유공주</td>
              <td>ugongju01</td>
              <td>쥬쥬쌤의 HTML</td>
              <td class="text-end">2,000,000,000원</td>
              <td></td>
              <td>무제한</td>
              <td></td>
              <td></td>
            </tr>
          </tbody>
        </table>
        <!-- table(e) -->

        <div class="btn-area">
          <button type="button" class="btn btn-secondary btn-sm">취소</button>
          <button type="button" class="btn btn-secondary btn-sm">환불</button>
        </div>

        <!-- pagenation(s) -->
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
        <!-- pagenation(e) -->
      </div>
    </div>
  </div>
  <!-- wwilsman 데이트픽커 js -->
  <script src="/ccccoding/admin/js/datepicker.js"></script>
</body>
</html>