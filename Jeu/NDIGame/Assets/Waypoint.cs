using UnityEngine;
using System.Collections.Generic;

namespace NDIGame
{

    [System.Serializable]
    public class Waypoint
    {

        [SerializeField] private List<Waypoint> next = new List<Waypoint>();
        [SerializeField] private Vector2 position;

        public Vector2 Position => position;
        
        public Waypoint RandomNext
        {
            get
            {
                return next.Count == 0 ? null : next[Random.Range(0, next.Count)];
            }

        }

    }

    [System.Serializable]
    public class Path
    {

        [SerializeField] private Waypoint[] path;
        [SerializeField] private Waypoint start;

        public Waypoint Start => start;

        public Waypoint this[int index]
        {
            get => path[index];
        }

    }

}
