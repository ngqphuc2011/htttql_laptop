<form action="modules/chart/process.php" method="GET">
    <div class="form-group">
        <label for="from-date-input">Thời gian bắt đầu</label>
        <input type="date" class="form-control" name="from-date" id="from-date-input" required>
    </div>
    <div class="form-group">
        <label for="to-date-input">Thời gian kết thúc</label>
        <input type="date" class="form-control" name="to-date" id="to-date-input" required>
    </div>
    <div class="form-group">
        <label for="period-input">Xem theo</label>
        <select name="period" class="form-control" id="period-input" required>
            <option value="day">Ngày</option>
            <option value="month">Tháng</option>
            <option value="year">Năm</option>
        </select>
    </div>
    <input type="submit" class="btn btn-info" name="create" value="Xem">
</form>