// fontion permettant de gérer l'affichage pour faire un changment d'onglet ne necessitant pas de
// recharger la page

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
// intitialisation de la varaible que si celle ci n'est pas définie
if (typeof(data) == 'undefined') {
    data ={
        old_tab : "home"
    }
}
