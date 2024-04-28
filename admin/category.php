<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/header.php';
  
  $sql = "SELECT * FROM category where step = 1";
  $result = $mysqli->query($sql);
  while ($row = $result->fetch_object()) {
    $cate1[] = $row;
  }
?>
      <!-- sub-page-tit-area (s) -->
      <div class="page-tit-area">
        <h2 class="tit-h2">카테고리</h2>
      </div>
      <!-- sub-page-tit-area (e) -->

      <!-- content-area(s) -->
      <div class="content">

        <!-- 카테고리 폼 -->
        <form action="#">
          <div class="row">
            <label for="single-slect-01" class="col-md-1 col-form-label tit-h4 visually-hidden">블라인드텍스트써주세요</label> <!-- label hidden으로 사용 -->
            <div class="col-md-12">
              <div class="input-group">
                <div class="col-md-4 ipt-wrap">
                  <select class="form-select form-select-sm" id="select-01" aria-label="select">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                  
                </div>
                <div class="col-md-4 ipt-wrap">
                  <select class="form-select form-select-sm" id="single-slect-02"  aria-label="select">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                </div>
                <div class="col-md-4 ipt-wrap">
                  <select class="form-select form-select-sm" id="single-slect-03"  aria-label="select">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                </div>
              </div>
            </div>
          </div>

          <!-- 틍록버튼 -->
          <div class="buttons mt-5">
            <button type="button" class="btn btn-primary btn-lg">대분류 등록</button>
            <button type="button" class="btn btn-primary btn-lg">중분류 등록</button>
            <button type="button" class="btn btn-primary btn-lg">소분류 등록</button>
          </div>
        </form>

        <!-- 대분류 Modal -->
        <div class="modal cmodal fade" id="cate1Modal" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h2 class="modal-title fs-5" id="exampleModalLabel1">
                  대분류 등록
                </h2>
              </div>
              <div class="modal-body">
                <label for="name1">카테고리명</label>
                <input type="text" class="form-control" name="name1" id="name1" placeholder="대분류명을 입력하세요.">
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn_g" data-step="1" data-bs-dismiss="modal">
                  등록
                </button>
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal" aria-label="Close">
                  취소
                </button>
              </div>
            </div>
          </div>
        </div>

        <!-- 중분류 Modal-->
        <div class="modal cmodal fade" id="cate2Modal" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h2 class="modal-title fs-5" id="exampleModalLabel2">
                  중분류 등록
                </h2>
              </div>
              <div class="modal-body">
                <div class="row">
                              <div class="col-md-12">
                    <select class="form-select " aria-label="Default select example" id="pcode2">
                      <option selected disabled>대분류를 선택해주세요.</option>
                                        <option value="1">프로그래밍</option>
                                        <option value="4">UI.UXddd</option>
                                        <option value="54">aaa</option>
                                    </select>
                  </div>
                </div>
                <label for="name2">카테고리명</label>
                <input type="text" class="form-control" name="name2" id="name2" placeholder="중분류명을 입력하세요.">
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn_g" data-step="2" data-bs-dismiss="modal">
                  등록
                </button>
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal" aria-label="Close">
                  취소
                </button>
              </div>
            </div>
          </div>
        </div>

        <!--소분류 Modal-->
        <div class="modal cmodal fade" id="cate3Modal" tabindex="-1" aria-labelledby="exampleModalLabel3" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h2 class="modal-title fs-5" id="exampleModalLabel3">
                  소분류 등록
                </h2>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-6">
                    <select class="form-select" aria-label="Default select example" id="pcode2_1">
                      <option selected disabled>대분류</option>
                                        <option value="1">프로그래밍</option>
                                        <option value="4">UI.UXddd</option>
                                        <option value="54">aaa</option>
                                    </select>
                  </div>
                  <div class="col-md-6">
                    <select class="form-select" aria-label="Default select example" id="pcode3">
                      <option selected disabled>중분류를 선택해주세요</option>
                    </select>
                  </div>
                </div>
                <label for="name3">카테고리명</label>
                <input type="text" class="form-control" name="name3" id="name3" placeholder="소분류명을 입력하세요.">
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn_g" data-step="3" data-bs-dismiss="modal">
                  등록
                </button>
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal" aria-label="Close">
                  취소
                </button>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</body>
</html>