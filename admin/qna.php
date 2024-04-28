<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/header.php';
?>
      <!-- 상단 until-list (e) -->
      <!-- sub-page-tit-area (s) -->
      <div class="page-tit-area">
        <h2 class="tit-h2">Q&amp;A</h2>
      </div>
      <!-- sub-page-tit-area (e) -->

      <div class="content">
        
        <table class="table table-bordered text-center">
          <!-- 각자 크기에 맞게 위드값 조정 합쳐서 100% -->
          <colgroup>
            <col style="width:auto">
            <col style="width:50%">
            <col style="width:auto">
            <col style="width:auto">
          </colgroup>
          <thead>
            <tr>
              <th scope="col">처리현황</th>
              <th scope="col">제목</th>
              <th scope="col">작성자</th>
              <th scope="col">등록일</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <button type="button" class="btn btn-primary btn-sm">답변완료</button>
              </td>
              <td>자부담금 환급은 어떻게 받나요?</td>
              <td>우예지</td>
              <td>2024.04.18</td>
            </tr>
            <tr>
              <td>
                <button type="button" class="btn btn-primary btn-sm" disabled>답변대기</button>
              </td>
              <td>코딩은 처음인데, 어떻게 시작하면 좋을까요?</td>
              <td>박소현</td>
              <td>2024.04.02</td>
            </tr>
            <tr>
              <td>
                <button type="button" class="btn btn-primary btn-sm">답변완료</button>
              </td>
              <td>강의는 수강기간이 끝나면 더 들을 수 없나요?</td>
              <td>유부현</td>
              <td>2024.03.18</td>
            </tr>
            <tr>
              <td>
                <button type="button" class="btn btn-primary btn-sm" disabled>답변대기</button>
              </td>
              <td>온라인 학습은 어떻게 진행되나요?</td>
              <td>추송림</td>
              <td>2024.03.14</td>
            </tr>








            <tr>
              <td>
                <button type="button" class="btn btn-primary btn-sm">답변완료</button>
              </td>
              <td>내일배움 재직자 및 실직자 카드 등 국비지원으로 등록 가능한가요?</td>
              <td>임시원</td>
              <td>2024.03.12</td>
            </tr>
            <tr>
              <td>
                <button type="button" class="btn btn-primary btn-sm">답변완료</button>
              </td>
              <td>회원가입을 해야만 강의 구매가 가능한가요?</td>
              <td>우준범</td>
              <td>2024.03.11</td>
            </tr>
            <tr>
              <td>
                <button type="button" class="btn btn-primary btn-sm" disabled>답변대기</button>
              </td>
              <td>결제 후 언제부터 수강이 가능한가요?</td>
              <td>유부경</td>
              <td>2024.03.09</td>
            </tr>
            <tr>
              <td>
                <button type="button" class="btn btn-primary btn-sm" disabled>답변대기</button>
              </td>
              <td>사정이 생겨, 수강을 중지하고싶어요 가능한가요?</td>
              <td>김동주</td>
              <td>2024.03.08</td>
            </tr>
            <tr>
              <td>
                <button type="button" class="btn btn-primary btn-sm">답변완료</button>
              </td>
              <td>강의가 재생이 안되거나 계속 끊겨요</td>
              <td>유세권</td>
              <td>2024.03.07</td>
            </tr>
            <tr>
              <td>
                <button type="button" class="btn btn-primary btn-sm">답변완료</button>
              </td>
              <td>강의 영상을 다운로드 받을 수는 없나요?</td>
              <td>김희정</td>
              <td>2024.03.05</td>
            </tr>
          </tbody>
        </table>
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
      </div>
    </div>
  </div>
</body>
</html>