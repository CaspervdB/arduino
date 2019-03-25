package btconn.bluetooth;

import btconn.database.ConnectionDB;

import javax.bluetooth.DeviceClass;
import javax.bluetooth.DiscoveryListener;
import javax.bluetooth.RemoteDevice;
import javax.bluetooth.ServiceRecord;
import java.util.ArrayList;

public class ListenerBT implements DiscoveryListener {

    /// this is the array which will collect the devices when found
    private ArrayList<DeviceBT> devices;
    /// this is a boolean representing the state of the listener
    private boolean listening;
    /// array of names of bluetooth devices

    private boolean state;

    public ListenerBT(ArrayList<DeviceBT> devices)
    {
        this.devices = devices;
        listening = true;
        state = true;
    }

    public void deviceDiscovered(RemoteDevice remoteDevice, DeviceClass deviceClass) {
        listening = true;
        DeviceBT btDevice = new DeviceBT();
        try{
            btDevice.setName(remoteDevice.getFriendlyName(false));
        }catch (Exception ex)
        {
            btDevice.setName("Unknown");
        }
        btDevice.setAddress(remoteDevice.getBluetoothAddress());
        try{
            for(int i = 0; i < devices.size(); i++)
            {
                if(devices.get(i).getName().contains(btDevice.getName()))
                {
                    btDevice.createConn_string();
                    btDevice.setUser_id(devices.get(i).getUser_id());
                    devices.set(i, btDevice);
                    System.out.println(btDevice);
                }
            }
        }catch (Exception ex)
        {

        }
        boolean discoveredDevices = true;
        for(DeviceBT device : devices)
        {
            if(device.getAddress() == null)
            {
                discoveredDevices = false;
            }
        }
        if(discoveredDevices)
        {
            state = false;
        }
    }

    public void servicesDiscovered(int i, ServiceRecord[] serviceRecords) {
        listening = true;
    }

    public void serviceSearchCompleted(int i, int i1) {
        listening = false;
    }

    public void inquiryCompleted(int i) {
        listening = false;
    }

    public boolean isRunning()
    {
        return listening;
    }

    public boolean isState() {
        return state;
    }

    public ArrayList<DeviceBT> getDevices()
    {
        return devices;
    }
}
