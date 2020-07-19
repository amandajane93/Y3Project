class DBConnection
{
    var $con;

    function DBConnection()
    { 
        $this->conn = pg_connect("host='localhost' port='5432' dbname='social' user='postgres' password='Hdmcat93!'") or die("Unable to connect to database");
    }
}