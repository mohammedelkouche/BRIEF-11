function printTable(){
    var TABLE = document.getElementById("table");
    newwin = window.open("");
    newwin.document.write(TABLE.outerHTML);
    newwin.print();
    newwin.close();
}
printTable() 