<div class="p-2 bg-light rounded-3" id="superfont">
    <h1 class="display-5 fw-bold" id="superfont">ระบบค้นหาตารางเรียน</h1>
    <span class="my-2">กรุณาเลือกชั้นเรียนที่ต้องการค้นหาแล้วกดปุ่มค้นหา</span>
    <div class="container-fluid py-5" style="width: 80%;">
        <div class="justify-content-between align-items-center">
            <form name="stdtb" id="stdtb" method="post">
                <div class="input-group-lg input-group mb-3" width="80%">
                    <select name="stdclass" required="required" class="form-control text03" id="room">
                        <option selected value="">กรุณาเลือกชั้นเรียนเพื่อค้นหาตารางเรียน</option>
                        <!-- <option value="4/1">ม.4/1</option> -->
                        <option value="4/2">ม.4/2</option>
                        <option value="4/3">ม.4/3</option>
                    </select>
                    <button class="btn btn-lg btn-success" type="submit">
                        ค้นหาตารางเรียน
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>