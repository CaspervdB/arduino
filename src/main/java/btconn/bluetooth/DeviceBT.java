package btconn.bluetooth;

public class DeviceBT {

    private int user_id;
    private String bt_name;
    private String address;
    private String conn_string;
    public DeviceBT()
    {

    }

    public DeviceBT(int user_id, String bt_name)
    {
        this.user_id = user_id;
        this.bt_name = bt_name;
    }
    public void setName(String name)
    {
        this.bt_name = name;
    }

    public String getName()
    {
        return bt_name;
    }

    public void setUser_id(int id)
    {
        this.user_id = id;
    }

    public int getUser_id()
    {
        return user_id;
    }

    public void setAddress(String address)
    {
        this.address = address;
    }

    public String getAddress()
    {
        return address;
    }

    public void createConn_string() throws Exception
    {
        if(address == null)
        {
            throw new Exception("The address is empty");
        }else{
            conn_string = String.format("btspp://%s:1;authenticate=false;encrypt=false;master=false", address);
        }
    }

    public String getConnString()
    {
        return conn_string;
    }
    @Override
    public String toString()
    {
        return String.format("UserId: %d \nDevice name: %s \nDevice address: %s \nDevice connection: %s", user_id, bt_name, address, conn_string);
    }
}
