import React, { Component } from 'react';
import {Table, Thead, Tbody, Tr, Th, Td} from 'react-super-responsive-table';

class Root extends Component {
  constructor(props) {
    super(props)
  }

  render() {
    return (
      <Table>
        <Thead>
          <Tr>
            <Th>First Name</Th>
            <Th>Last Name</Th>
            <Th>Cause Of Death</Th>
            <Th>Age</Th>
            <Th>Total Cost</Th>
            <Th>Charged To</Th>
          </Tr>
        </Thead>
        <Tbody>
          <Tr>
            <Td>Joe</Td>
            <Td>Wilson</Td>
            <Td>ento colitis</Td>
            <Td>2</Td>
            <Td>18</Td>
            <Td>Harry Wilson</Td>
          </Tr>
          <Tr>
            <Td>Nancy</Td>
            <Td>Williams</Td>
            <Td>Tuberculosis</Td>
            <Td>30</Td>
            <Td>34.8</Td>
            <Td>Mrs. Amila Adcino</Td>
          </Tr>
          <Tr>
            <Td>Joe</Td>
            <Td>Gant</Td>
            <Td>Unknown</Td>
            <Td>45</Td>
            <Td>59</Td>
            <Td>Arthur Young</Td>
          </Tr>
          <Tr>
            <Td>Ashon</Td>
            <Td>Robinson</Td>
            <Td>Bron</Td>
            <Td>58</Td>
            <Td>93.5</Td>
            <Td>Mr.Robinson</Td>
          </Tr>
          <Tr>
            <Td>Joe</Td>
            <Td>Stoles Jr.</Td>
            <Td>appendicitis</Td>
            <Td>63</Td>
            <Td>46.5</Td>
            <Td>Mrs. Jamie Stokes</Td>
          </Tr>
        </Tbody>
      </Table>
    )
  }
}

export default Root;
