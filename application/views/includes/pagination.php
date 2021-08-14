<div class="row">
    <div class="col-sm-12 col-md-5">
        <div class="dataTables_info" >Found: <label style="color:red;">{{ this.totalRows }}</label> total entries.</div>
    </div>
    <div class="col-sm-12 col-md-7">
        <pagination 
            :current_page="currentPage" 
            :row_count_page="rowCountPage" 
            @page-update="pageUpdate" 
            :total_rows="totalRows" 
            :page_range="pageRange"
        >
        </pagination>
    </div>
</div>