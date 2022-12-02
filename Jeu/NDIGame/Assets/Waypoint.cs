using UnityEngine;
using System.Collections.Generic;

namespace NDIGame
{

    [System.Serializable]
    public class Waypoint : MonoBehaviour
    {

        [SerializeField] private List<Waypoint> next = new List<Waypoint>();

        public List<Waypoint> Next => next;
        
        public Waypoint RandomNext
        {
            get
            {
                return next.Count == 0 ? null : next[Random.Range(0, next.Count)];
            }

        }

        public void OnDrawGizmos()
        {
            Gizmos.color = Color.red;
            Gizmos.DrawSphere(transform.position, 0.2f);

            if(next.Count == 0)
            {
                return;
            }

            foreach(Waypoint waypoint in next)
            {
                Gizmos.color = Color.black;
                Gizmos.DrawLine(transform.position, waypoint.transform.position);
            }

        }

    }

}
