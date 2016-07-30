var line = 0;

function get_spider_list(svcs){
    for (var i=0; i< svcs.length; i++)
    {
        var svc = svcs[i];
        var loadid = '#tryloading' + i.toString();
        var url = 'http://' + svc + '/listallspiders.json';
        var req = {'url':url,
            'data':{},
            'type':'GET',
            'datatype':'json',
            'success':handle_spider_list(svc, loadid),
            'error':handle_spider_list_error(svc, loadid)};
        $.ajax(req);
    }
}

function handle_spider_list_error(server, loadid){
    return function(err){
        var loading = $(loadid);
        var visible = loading.is(":visible")
        if(typeof(loading) != "undefined" && visible){
            loading.remove();http://localhost/DataTables-1.10.8/media/js/jquery.dataTables.js
            var tip = $('#tiparea');
            var txt = "<div><span style='color: red'>" +server.toString()+ ":it's time out to load spiders </span></div>"
            tip.append(txt)
        }
    }
}

var binit = false;
function handle_spider_list(server, loadid){
    return function(json, status){
        var loading = $(loadid);
        loading.remove()
        if(status == "success"){
            var tblspiders = $('table#tblspiders').DataTable();
            for(var prj in json.spiderall){
                var objprj = json.spiderall[prj];
                for(var i in objprj){
                    var spider = objprj[i];
                    var startbtn = "<button type=\"button\" class=\"btn btn-primary dropdown-toggle\" data-toggle=\"modal\" data-target=\"#startnew-dialog\">启动</button>";
                    var delbtn = "<button type=\"button\" class=\"btn\" onclick=\"delete_spider_project('"+server+"','"+prj+"','"+spider+"')\">删除项目</button>";
                    var logbtn = "<button type=\"button\" class=\"btn\" onclick=\"goto_spider_log('"+server+"','"+prj+"','"+spider+"')\">查看日志</button>";
                    var space = "<span> </span>"
                    var num_id = 'num_'+line;
                    tblspiders.row.add(
                        [line,server,prj,spider,num_id,startbtn+space+delbtn+space+logbtn]
                    ).draw();
                    line ++;
                }
            }
        }
    }
}