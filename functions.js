function change_tab(name) {
        console.log("aye" + name);
        document.getElementById('tab_'+name).className = 'tab_1 tab';
        document.getElementById('content_tab_'+name).style.display = 'block';
        let old = data.old_tab;
        data.old_tab = name;
        if (old != name)
        {
            // si élément supprimé affiche erreur mais fonctionne !
            document.getElementById('tab_' + old).className = 'tab_0 tab';
            document.getElementById('content_tab_'+ old).style.display = 'none';
        }


}
data ={
    old_tab : "home"
}