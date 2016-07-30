(function(){
    $.fn.DataTableExtend = function(){
        var dataTable = $(this).DataTable();


        this.findFirstCellDataByColumns = function(json, icol){
            var irow = this.findFirstRowByColumns(json);
            if(irow >= 0){
                return dataTable.cell(irow, icol).data();
            }
            return '';
        }

        this.updateFirstCellDataByColumns = function(json, icol, val){
            var irow = this.findFirstRowByColumns(json);
            if(irow >= 0){
                dataTable.cell(irow, icol).data(val).draw();
            }
        }

        this.findFirstRowByColumns = function(json){
            var cells = dataTable.rows().cells().indexes();
            var rows = dataTable.rows().data();
            var colcnt = cells.length / rows.length;
            for(var i=0; i<rows.length; i++){
                var row = rows[i];
                var cnt = 0;
                var jsoncnt = 0;
                for(var j in json){
                    jsoncnt++;
                    var v = json[j];
                    if(row[j].indexOf(v) < 0){
                        break;
                    }
                    cnt++;
                }
                if(cnt == jsoncnt){
                    var cell = cells[i * colcnt];
                    var irow = cell.row;
                    return irow;
                }
            }
            return -1;
        }

        /*
         * deleteRowsByColumns({1:'Direct',2:'2'});
         * */
        this.deleteRowsByColumns = function(json){
            var cntdel = 0;
            do{
                bfind = false;
                var irow = this.findFirstRowByColumns(json);
                if(irow >= 0){
                    bfind = true;
                    dataTable.row(irow).remove().draw();
                    cntdel++;
                }
            }while(bfind);
            return cntdel;
        }

        this.deleteRowsByCallback = function(callback){
            var cntdel = 0;
            var rows = dataTable.rows().data();
            for(var i = 0; i < rows.length; i++){
                var row = rows[i];
                if(callback(row)){
                    var arg = {}
                    for(var j = 0; j < row.length; j++){
                        arg[j] = row[j];
                    }
                    var irow = this.findFirstRowByColumns(arg);
                    if(irow >= 0){
                        dataTable.row(irow).remove().draw();
                        cntdel++;
                    }
                }
            }
        }
        return this;
    }
})(jQuery);