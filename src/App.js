import React, { useEffect, useState } from "react";
import {
  CartesianGrid,
  Line,
  LineChart,
  ResponsiveContainer,
  XAxis,
  YAxis,
} from "recharts";
import ReactLoading from "react-loading";
import axios from "axios";

export default function App() {
  const [data, setData] = useState([]);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    getData(7);
  }, []);

  async function getData(range) {
    setLoading(true);
    const url =
      window.location.origin +
      window.location.pathname.split("wp-admin")[0] +
      `wp-json/wpdw/data?range=${range}`;

    const res = await axios.get(url);
    setData(res.data.reverse());
    setLoading(false);
  }

  return (
    <div>
      <div
        style={{
          display: "flex",
          alignItems: "center",
          justifyContent: "space-between",
        }}
      >
        <span style={{ fontSize: "16px" }}>Filter by</span>
        <select
          onChange={(e) => getData(e.target.value)}
          name="filter"
          id="filter"
        >
          <option value="7">Last 7 Days</option>
          <option value="15">Last 15 Days</option>
          <option value="30">Last 30 Days</option>
        </select>
      </div>
      <div>
        {loading ? (
          <div
            style={{
              width: "100%",
              display: "flex",
              alignItems: "center",
              justifyContent: "center",
              height: 350,
            }}
          >
            <ReactLoading width={40} height={40} type="spin" color="#8884d8" />
          </div>
        ) : (
          <ResponsiveContainer width="100%" height={350}>
            <LineChart data={data}>
              <XAxis dataKey="day" />
              <YAxis />
              <CartesianGrid stroke="#eee" strokeDasharray="5 5" />
              <Line type="monotone" dataKey="value" stroke="#8884d8" />
            </LineChart>
          </ResponsiveContainer>
        )}
      </div>
    </div>
  );
}
