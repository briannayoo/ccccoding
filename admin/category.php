<?php
  session_start();
  $title = '카테고리';
  
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/header.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/dbcon.php';

  $sql = "SELECT * FROM category where step = 1";
  $result = $mysqli->query($sql);
  while ($row = $result->fetch_object()) {
    $cate1[] = $row;
  };
  // $sql = "SELECT * FROM category where step = 2";
  // $result = $mysqli->query($sql);
  // while ($row = $result->fetch_object()) {
  //   $cate2[] = $row;
  // };
  // $sql = "SELECT * FROM category where step = 3";
  // $result = $mysqli->query($sql);
  // while ($row = $result->fetch_object()) {
  //   $cate3[] = $row;
  // };
?>
      <!-- sub-page-tit-area (s) -->
      <div class="page-tit-area">
        <h2 class="tit-h2">카테고리</h2>
      </div>
      <!-- sub-page-tit-area (e) -->

      <!-- content-area(s) -->
      <div class="content cate">

        <!-- 카테고리 폼 -->
        <form action="#">
          <div class="row">
            <label for="single-slect-01" class="col-md-1 col-form-label tit-h4 visually-hidden">블라인드텍스트써주세요</label> <!-- label hidden으로 사용 -->
            <div class="col-md-12">
              <div class="input-group">
                <div class="col-md-4 ipt-wrap">
                  <select class="form-select form-select-sm tit-h3" id="cate1" aria-label="대분류">
                  <option selected disabled>대분류</option>
                  <?php
                    foreach ($cate1 as $c1) {
                  ?>
                    <option value="<?= $c1->code; ?>"><?= $c1->name; ?></option>
                  <?php
                    }
                  ?>
                  </select>
                  
                </div>
                <div class="col-md-4 ipt-wrap">
                  <select class="form-select form-select-sm tit-h3" id="cate2"  aria-label="중분류">
                  <option selected disabled>중분류</option>
                  </select>
                </div>
                <div class="col-md-4 ipt-wrap">
                  <select class="form-select form-select-sm tit-h3" id="cate3"  aria-label="소분류">
                  <option selected disabled>소분류</option>
                  </select>
                </div>
              </div>
            </div>
          </div>

          <!-- 틍록버튼 -->
          <div class="buttons mt-5 d-flex justify-content-around">
            <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#cate1Modal">대분류 등록</button>
            <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#cate2Modal">중분류 등록</button>
            <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#cate3Modal">소분류 등록</button>
          </div>
        </form>

        <!-- 대분류 Modal -->
        <div class="modal fade" id="cate1Modal" tabindex="-1" aria-labelledby="cate1ModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="bnr-tit-m" id="cate1ModalLabel">대분류 등록</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body row">
                <div class="col">
                  <input type="text" class="form-control" id="code1" name="code1" placeholder="코드명 입력 ex)A0001">
                </div>
                <div class="col">
                  <input type="text" class="form-control" id="name1" name="name1" placeholder="대분류명 입력">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal">닫기</button>
                <button type="submit" class="btn btn-primary btn-lg" data-step="1">등록</button>
              </div>
            </div>
          </div>
        </div>

        <!-- 중분류 Modal-->
        <div class="modal fade" id="cate2Modal" tabindex="-1" aria-labelledby="cate2ModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="cate2ModalLabel">중분류 등록</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <select class="form-select" aria-label="대분류" id="pcode2">
                    <option disabled>대분류를 선택해주세요</option>
                    <?php
                    foreach ($cate1 as $c1) {
                    ?>
                      <option value="<?= $c1->code; ?>"><?= $c1->name; ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
                <div class="row mt-3">
                  <div class="col">
                    <input type="text" class="form-control" id="code2" name="code2" placeholder="코드명 입력 ex)B0001">
                  </div>
                  <div class="col">
                    <input type="text" class="form-control" id="name2" name="name2" placeholder="중분류명 입력">
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal">닫기</button>
                <button type="submit" class="btn btn-primary btn-lg" data-step="2">등록</button>
              </div>
            </div>
          </div>
        </div>

        <!--소분류 Modal-->
        <div class="modal fade" id="cate3Modal" tabindex="-1" aria-labelledby="cate3ModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="cate3ModalLabel">소분류 등록</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                <div class="row">
                  <div class="col">
                    <select class="form-select" aria-label="대분류" id="pcode2_1">
                      <option selected disabled>대분류를 먼저 선택해주세요</option>
                      <?php
                      foreach ($cate1 as $c1) {
                      ?>
                        <option value="<?= $c1->code; ?>"><?= $c1->name; ?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="col">
                    <select class="form-select" aria-label="중분류" id="pcode3">

                    </select>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col">
                    <input type="text" class="form-control" id="code3" name="code3" placeholder="코드명 입력 ex)C0001">
                  </div>
                  <div class="col">
                    <input type="text" class="form-control" id="name3" name="name3" placeholder="소분류명 입력">
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal">닫기</button>
                <button type="submit" class="btn btn-primary btn-lg" data-step="3">등록</button>
              </div>
            </div>
          </div>
        </div>
      </div>

      </div>
    </div>
  </div>
  <script src="/ccccoding/admin/js/makeoption.js"></script>
  <script>
    let categorySubmitBtn = $(".modal button[type='submit']");

    categorySubmitBtn.click(function() {
      let step = $(this).attr('data-step');
      save_category(step);
    });

    function save_category(step) {
      let code = $(`#code${step}`).val();
      let name = $(`#name${step}`).val();
      let pcode = $(`#pcode${step} option:selected`).val();

      if (step > 1 && !pcode) {
        alert('부모 분류를 선택하세요');
        return;
      }
      if (!code) {
        alert('분류코드를 입력하세요');
        return;
      }
      if (!name) {
        alert('분류명을 입력하세요');
        return;
      }

      let data = {
        name: name,
        code: code,
        pcode: pcode,
        step: step
      }
      $.ajax({
        async: false,
        type: 'post',
        data: data,
        url: "save_category.php",
        dataType: 'json',
        error: function(error) {
          console.log(error);
        },
        success: function(data) {
          console.log(data.result, typeof(data.result));
          if (data.result === 1) {
            alert('등록 성공');
            location.reload(); // 새로고침
          } else if (data.result === '-1') {
            alert('코드가 중복됩니다.');
            location.reload(); //강제 새로고침
          } else if (data.result === 'member') {
            alert('관리자가 아닙니다.');
            location.href = '/ccccoding/admin/login.php';
          } else {
            alert('등록 실패');
            location.reload(); // 새로고침
          }

        }
      }); //ajax
    }
  </script>
</body>
</html>