function change_tab(name) {
        document.getElementById('tab_'+name).className = 'tab_1 tab';
        document.getElementById('content_tab_'+name).style.display = 'block';
        let old = data.old_tab;
        data.old_tab = name;
        if (old != name)
        {
            document.getElementById('tab_' + old).className = 'tab_0 tab';
            document.getElementById('content_tab_'+ old).style.display = 'none';
        }


}
if (typeof(data) == 'undefined') {
    data ={
        old_tab : "home"
    }
}
