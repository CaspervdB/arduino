package btconn.bluetooth;

import javax.bluetooth.DiscoveryAgent;
import javax.bluetooth.LocalDevice;
import javax.microedition.io.Connector;
import javax.microedition.io.StreamConnection;
import java.io.DataOutputStream;
import java.util.ArrayList;
import java.util.HashMap;

public class ConnectionBT {

    private ListenerBT listenerBT;
    private LocalDevice localDevice;
    private DiscoveryAgent agent;
    private ArrayList<ConnectionDetails> connections;

    public ConnectionBT(ListenerBT listenerBT) throws Exception
    {
        localDevice = LocalDevice.getLocalDevice();
        agent = localDevice.getDiscoveryAgent();
        this.listenerBT = listenerBT;
        connections = new ArrayList<ConnectionDetails>();
    }

    public void startDiscovery() throws Exception
    {
        agent.startInquiry(DiscoveryAgent.GIAC, listenerBT);
    }

    public void createConnections() throws Exception
    {
        String connStr = "";
        for(DeviceBT device : listenerBT.getDevices())
        {
                connStr = device.getConnString();
                System.out.println("Creating connection for: " + device.getName());
                connections.add(new ConnectionDetails(device.getUser_id(), (StreamConnection) Connector.open(connStr)));

        }
    }
    public void sendCommands(int userId, String cmd) throws Exception
    {

        ConnectionDetails connectionDetails = null;
        for(ConnectionDetails connection : connections)
        {
            if(connection.getUserId() == userId)
            {
                connectionDetails = connection;
                break;
            }
        }
        connectionDetails.sendCommand(cmd);
    }

    public boolean hasDiscoveredDevices()
    {
        return listenerBT.isState();
    }

    public ArrayList<DeviceBT> getDevices()
    {
        return listenerBT.getDevices();
    }
}
