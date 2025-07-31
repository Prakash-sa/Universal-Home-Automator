# Universal Home Automator – IoT Module

This project is part of the **Universal Home Automator**, an IoT-based home automation system that enables users to control appliances remotely via a centralized interface. The IoT module facilitates communication between the user interface and physical devices using microcontrollers and cloud APIs.

This project brings up the IOT on Web making it universally available.

This project was made in a hackathon held at NSUT Delhi namely hackNSUT.

## 🌐 Overview

The IoT module connects sensors and actuators to a NodeMCU (ESP8266) and integrates with Firebase for real-time control and monitoring. Users can operate appliances through a web or Android interface, with real-time sync across all devices.

## 📦 Features

- Remote control of home appliances (fan, lights, etc.)
- Real-time status updates using Firebase Realtime Database
- Sensor data monitoring (temperature, humidity, motion)
- Automatic device control based on sensor thresholds
- Low-cost implementation using ESP8266 NodeMCU
- Easy integration with Android app/web dashboard

## ⚙️ Tech Stack

- **Microcontroller**: NodeMCU (ESP8266)
- **Cloud**: Firebase Realtime Database
- **Language**: Embedded C (Arduino IDE)
- **Sensors Used**: DHT11 (Temperature & Humidity), IR Sensor, LDR
- **Relays**: 2-channel relay module for controlling AC appliances

## 🛠️ Hardware Requirements

- NodeMCU ESP8266 board
- DHT11 temperature and humidity sensor
- IR sensor for motion detection
- LDR (Light Dependent Resistor)
- Relay module (2-channel or 4-channel)
- Power supply
- Jumper wires, breadboard, resistors

## 🔌 Circuit Diagram

Include a diagram image here if available (e.g., `/assets/circuit_diagram.png`)

## 🚀 Getting Started

1. Clone the repo:
   ```bash
   git clone https://github.com/Prakash-sa/Universal-Home-Automator.git
   cd Universal-Home-Automator/IOT
