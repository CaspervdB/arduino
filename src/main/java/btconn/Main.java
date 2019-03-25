package btconn;

import btconn.bluetooth.ConnectionBT;
import btconn.bluetooth.ListenerBT;
import btconn.database.ConnectionDB;
import btconn.database.UserCommand;

import java.util.ArrayList;

public class Main {
    public static void main(String[] args)
    {
        try{
            ConnectionDB connectionDB = new ConnectionDB();
            ListenerBT bt = new ListenerBT(connectionDB.getBluetoothNames());
            ConnectionBT bluetoothConn = new ConnectionBT(bt);

            bluetoothConn.startDiscovery();
            System.out.println("Discovering devices has started");

            while(bluetoothConn.hasDiscoveredDevices())
            {
                try{
                    Thread.sleep(500);
                }catch (Exception ex){

                }
            }
            System.out.println("\nThe program found: " + bluetoothConn.getDevices().size() +"\n");
            System.out.println("Program ended!");
            bluetoothConn.createConnections();
            while(true)
            {
                ArrayList<UserCommand> usrCmds = connectionDB.getCommands();
                for(UserCommand usrCmd : usrCmds)
                {
                    bluetoothConn.sendCommands(usrCmd.getUserid(), usrCmd.getCommand());
                    connectionDB.delete(usrCmd.getId());
                }
            }
        }catch (Exception ex)
        {
            ex.printStackTrace();
        }
    }
}
